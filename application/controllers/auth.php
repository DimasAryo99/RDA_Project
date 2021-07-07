<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class auth extends CI_Controller 
{
    
    public function index()
    {
        
        $this->form_validation->set_rules('email','Email','trim|required|valid_email');
        $this->form_validation->set_rules('password','Password','trim|required');
        if ($this->form_validation->run() == false)
        {
            $data['tittle'] = 'Login Page';
            $this->load->view('template/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('template/auth_footer');
        } 
        else
        {
            //validasi succes
            $this->_login();
        }
        
    }
    
    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        
        $user = $this->db->get_where('user', ['email' => $email])->row_array();
        
        //jika usernya ada
        if($user) 
        {
            //jika usernya aktif
            if($user['is_active']==1) 
            {
                //cek password
                if(password_verify($password, $user['password']))
                {
                    $data = ['email' => $user['email'],
                             'role_id' => $user['role_id']
                ];
                $this->session->set_userdata($data);
                if($user['role_id'] == 1)
                {
                    redirect('admin');
                }
                    redirect('user');
                }
                else
                {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Wrong Password</div>');
                    redirect('auth');
                }
            }
            else
            {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Email has not been activated</div>');
                redirect('auth');
            }
        }
        else
        {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Email is not registered</div>');
            redirect('auth');
        }
    }

    public function registration()
    {
        $this->form_validation->set_rules('name','Name','required|trim');
        $this->form_validation->set_rules('email','Email','required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'Email has already registered!'
        ]);
        $this->form_validation->set_rules('password1','Password','required|trim|min_length[3]|matches[password2]');
        $this->form_validation->set_rules('password2','Password','required|trim|matches[password1]', [
            'matches' =>  'Password dont match!',
            'min_length' => 'Password too shot!'
        ]);

        if ($this->form_validation->run() == false)  
        {
            $data['title'] = 'Regist Page';
            $this->load->view('template/auth_header', $data);
            $this->load->view('auth/registration');
            $this->load->view('template/auth_footer');
        } 
        else {
         $data = ['name_admin' => htmlspecialchars($this->input->post('name', true)), 
                  'email_admin' => htmlspecialchars($this->input->post('email', true)),
                  'image_admin' => 'default.jpg', 
                  'password_admin' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                  'role_id' => 2,
                  'is_active' => 1,
                  'date_created' => time()
                ];
            $this->db->insert('admin_toko', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Your account has been created</div>');
            redirect('auth');
        }
    }
    
    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Your have been logout</div>');
        redirect('auth');
    }
} 