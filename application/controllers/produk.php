<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class produk extends CI_Controller
{
    public function laptop()
    {
        $data['tittle'] = 'Laptop';
        $this->load->model('Kategori_model');
        $data['laptop'] = $this->Kategori_model->laptopkategori()->result();
        $this->load->view('template_user/header');
        $this->load->view('template_user/sidebar', $data);
        $this->load->view('template_user/topbar');
        $this->load->view('template_user/laptop', $data);
        $this->load->view('template_user/footer');
    }

    public function handphone()
    {
        $data['tittle'] = 'Handphone';
        $this->load->model('Kategori_model');
        $data['handphone'] = $this->Kategori_model->handphonekategori()->result();
        $this->load->view('template_user/header');
        $this->load->view('template_user/sidebar', $data);
        $this->load->view('template_user/topbar');
        $this->load->view('template_user/handphone', $data);
        $this->load->view('template_user/footer');
    }

    public function earphone()
    {
        $data['tittle'] = 'Earphone';
        $this->load->model('Kategori_model');
        $data['earphone'] = $this->Kategori_model->earphonekategori()->result();
        $this->load->view('template_user/header');
        $this->load->view('template_user/sidebar', $data);
        $this->load->view('template_user/topbar');
        $this->load->view('template_user/earphone', $data);
        $this->load->view('template_user/footer');
    }

    public function astore()
    {
        $data['tittle'] = 'A Store';
        $this->load->model('Kategori_model');
        $data['astore'] = $this->Kategori_model->astorekategori()->result();
        $this->load->view('template_user/header');
        $this->load->view('template_user/sidebar', $data);
        $this->load->view('template_user/topbar');
        $this->load->view('template_user/astore', $data);
        $this->load->view('template_user/footer');
    }

    public function dstore()
    {
        $data['tittle'] = 'D Store';
        $this->load->model('Kategori_model');
        $data['dstore'] = $this->Kategori_model->dstorekategori()->result();
        $this->load->view('template_user/header');
        $this->load->view('template_user/sidebar', $data);
        $this->load->view('template_user/topbar');
        $this->load->view('template_user/dstore', $data);
        $this->load->view('template_user/footer');
    }

    public function istore()
    {
        $data['tittle'] = 'I Store';
        $this->load->model('Kategori_model');
        $data['istore'] = $this->Kategori_model->istorekategori()->result();
        $this->load->view('template_user/header');
        $this->load->view('template_user/sidebar', $data);
        $this->load->view('template_user/topbar');
        $this->load->view('template_user/istore', $data);
        $this->load->view('template_user/footer');
    }




}
