<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class registrasi_pengguna extends CI_Controller
{

        public function index()
        {
                $this->form_validation->set_rules('nama', 'Nama', 'required|trim', ['required' => 'Nama Wajib Diisi!']);
                $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[pengguna.email]', [
                    'is_unique' => 'Email has already registered!']);
                $this->form_validation->set_rules('username', 'Username', 'required', ['required' => 'Username Wajib Diisi!']);
                $this->form_validation->set_rules('password_1', 'Password', 'required|trim|matches[password_2]', 
                ['required' => 'Password Wajib Diisi!', 'matches' => 'Password tidak cocok.']);
                $this->form_validation->set_rules('password_2', 'Password', 'required|trim|matches[password_1]');
                if ($this->form_validation->run() == false) 
                {
                    $this->load->view('template/auth_header');
                    $this->load->view('template_user/registrasi');
                    $this->load->view('template/auth_footer');
                } else 
                {
                    $data = [
                        'id'            => '',
                        'image'         => 'default.jpg',
                        'nama'          => $this->input->post('nama'),
                        'email'         => $this->input->post('email'),
                        'username'      => $this->input->post('username'),
                        'password'      => $this->input->post('password_1'),
                        'role_id'       => 3
                    ];

                    $this->db->insert('pengguna', $data);
                    redirect('auth_pengguna/login');
                }
        }
}