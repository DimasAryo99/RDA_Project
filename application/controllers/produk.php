<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class produk extends CI_Controller
{
    public function laptop()
    {
        $data['tittle'] = 'Laptop';
        $data['user'] =  $this->db->get_where('pengguna',['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->model('Kategori_model');

        $data['tampil'] = $this->Produk_model->tampil_jumlahkeranjang()->row_array();

        $data['laptop'] = $this->Kategori_model->laptopkategori()->result();
        $this->load->view('template_user/header');
        $this->load->view('template_user/sidebar', $data);
        $this->load->view('template_user/topbar',$data);
        $this->load->view('template_user/laptop', $data);
        $this->load->view('template_user/footer');
    }

    public function handphone()
    {
        $data['tittle'] = 'Handphone';
        $data['user'] =  $this->db->get_where('pengguna',['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->model('Kategori_model');

        $data['tampil'] = $this->Produk_model->tampil_jumlahkeranjang()->row_array();

        $data['handphone'] = $this->Kategori_model->handphonekategori()->result();
        $this->load->view('template_user/header');
        $this->load->view('template_user/sidebar', $data);
        $this->load->view('template_user/topbar',$data);
        $this->load->view('template_user/handphone', $data);
        $this->load->view('template_user/footer');
    }

    public function earphone()
    {
        $data['tittle'] = 'Earphone';
        $data['user'] =  $this->db->get_where('pengguna',['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->model('Kategori_model');

        $data['tampil'] = $this->Produk_model->tampil_jumlahkeranjang()->row_array();

        $data['earphone'] = $this->Kategori_model->earphonekategori()->result();
        $this->load->view('template_user/header');
        $this->load->view('template_user/sidebar', $data);
        $this->load->view('template_user/topbar',$data);
        $this->load->view('template_user/earphone', $data);
        $this->load->view('template_user/footer');
    }

    public function astore()
    {
        $data['tittle'] = 'A Store';
        $data['user'] =  $this->db->get_where('pengguna',['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->model('Kategori_model');

        $data['tampil'] = $this->Produk_model->tampil_jumlahkeranjang()->row_array();

        $data['astore'] = $this->Kategori_model->astorekategori()->result();
        $this->load->view('template_user/header');
        $this->load->view('template_user/sidebar', $data);
        $this->load->view('template_user/topbar',$data);
        $this->load->view('template_user/astore', $data);
        $this->load->view('template_user/footer');
    }

    public function dstore()
    {
        $data['tittle'] = 'D Store';
        $data['user'] =  $this->db->get_where('pengguna',['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->model('Kategori_model');

        $data['tampil'] = $this->Produk_model->tampil_jumlahkeranjang()->row_array();

        $data['dstore'] = $this->Kategori_model->dstorekategori()->result();
        $this->load->view('template_user/header');
        $this->load->view('template_user/sidebar', $data);
        $this->load->view('template_user/topbar',$data);
        $this->load->view('template_user/dstore', $data);
        $this->load->view('template_user/footer');
    }

    public function istore()
    {
        $data['tittle'] = 'I Store';
        $data['user'] =  $this->db->get_where('pengguna',['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->model('Kategori_model');

        $data['tampil'] = $this->Produk_model->tampil_jumlahkeranjang()->row_array();

        $data['istore'] = $this->Kategori_model->istorekategori()->result();
        $this->load->view('template_user/header');
        $this->load->view('template_user/sidebar', $data);
        $this->load->view('template_user/topbar',$data);
        $this->load->view('template_user/istore', $data);
        $this->load->view('template_user/footer');
    }

}
