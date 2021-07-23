<?php

class auth_pengguna extends CI_Controller
{
        public function login()
        {
            $data['tittle']='Login';
            $this->form_validation->set_rules('email', 'Email', 'required', ['required' => 'Email wajib diisi!']);
            $this->form_validation->set_rules('password', 'Password', 'required', ['required' => 'Password wajib diisi!']);
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('template/auth_header');
                $this->load->view('template_user/login',$data);
                $this->load->view('template/auth_footer');
            } else {
                $this->load->model('pengguna_model');
                $auth = $this->pengguna_model->cek_login();
    
                if ($auth == FALSE) {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Username atau Password Anda Salah!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                  </div>');
                    redirect('auth_pengguna/login');
                } else {
                    $this->session->set_userdata('email', $auth->email);
                    $this->session->set_userdata('role_id', $auth->role_id);
                    switch ($auth->role_id) {
                        case 3:
                            redirect('home_user');
                            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                            Your have been login</div>');
                            break;
                        case 2:
                            redirect('welcome');
                            break;
                        default:
                            break;
                    }
                }
            }
        }
    
        public function logout()
        {
            $this->session->unset_userdata('email');
            $this->session->unset_userdata('role_id');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Your have been logout</div>');
            redirect('home_user');
        }
}
