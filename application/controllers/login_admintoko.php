<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class login_admintoko extends CI_Controller 
{
    public function index()
    {    
        $this->form_validation->set_rules('email_admin','Email','trim|required|valid_email');
        $this->form_validation->set_rules('password_admin','Password','trim|required');
        if ($this->form_validation->run() == false)
        {
            $data['tittle'] = 'Login Page';
            $this->load->view('template/auth_header', $data);
            $this->load->view('auth/login_admintoko');
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
        $email = $this->input->post('email_admin');
        $password = $this->input->post('password_admin');
        
        $admin = $this->db->get_where('admin_toko', ['email_admin' => $email])->row_array();
        
        //jika usernya ada
        if($admin) 
        {
            //jika usernya aktif
            if($admin['is_active']==1) 
            {
                //cek password
                if(password_verify($password, $admin['password_admin']))
                {
                    $data = ['email_admin' => $admin['email_admin'],
                             'role_id' => $admin['role_id']
                    ];
                    $this->session->set_userdata($data);
                    if($admin['role_id'] == 2)
                    {
                        redirect('user');
                    }
                }
                else
                {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Wrong Password</div>');
                    redirect('login_admintoko');
                }
            }
            else
            {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Email has not been activated</div>');
                redirect('login_admintoko');
            }
        }
        else
        {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Email is not registered</div>');
            redirect('login_admintoko');
        }
    }
}