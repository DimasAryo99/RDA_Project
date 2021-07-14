<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class home_user extends CI_Controller
{
    public function index()
    {
        $data['tittle'] = 'Home';
        $data['user'] = $this->db->get('pengguna')->row_array();
        $this->load->model('Produk_model');
        $data['produk'] = $this->Produk_model->tampil_produk()->result();
        $this->load->view('template_user/header');
        $this->load->view('template_user/sidebar', $data);
        $this->load->view('template_user/topbar', $data);
        $this->load->view('template_user/home', $data);            
        $this->load->view('template_user/footer');
    }

}
