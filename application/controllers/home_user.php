<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class home_user extends CI_Controller
{
    public function index()
    {
        $data['tittle'] = 'Home';
        $data['user'] =  $this->db->get_where('pengguna',['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->model('Produk_model');

        $data['tampil'] = $this->Produk_model->tampil_jumlahkeranjang()->row_array();
        $data['tampil1'] = $this->invoice_model->tampil_jumlahinvoice()->row_array();

        $data['produk'] = $this->Produk_model->tampil_produk()->result();
        
        $this->load->view('template_user/header',$data);
        $this->load->view('template_user/sidebar', $data);
        $this->load->view('template_user/topbar', $data);
        $this->load->view('template_user/home', $data);            
        $this->load->view('template_user/footer');
    }
}
