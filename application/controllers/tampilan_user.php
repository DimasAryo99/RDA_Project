<?php

class tampilan_user extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('email')=='') 
        {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Anda Belum Login!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>');
            redirect('auth_pengguna/login');
        }
    }

    public function tambah_ke_keranjang($id)
    {
        $this->load->model('Produk_model');
        $produk = $this->Produk_model->find($id);

        $data = array(
            'id'      => $produk->id_produk,
            'qty'     => 1,
            'price'   => $produk->harga_produk,
            'name'    => $produk->nama_produk,

        );
        $this->cart->insert($data);
        redirect('home_user');
    }

    public function detail_keranjang()
    {
        $data['tittle'] = 'Home';
        $this->load->view('template_user/header');
        $this->load->view('template_user/sidebar', $data);
        $this->load->view('template_user/topbar');
        $this->load->view('template_user/keranjang');            
        $this->load->view('template_user/footer');
    }

    public function hapus_keranjang()
    {
        $this->cart->destroy();
        redirect('home_user/index');
    }

    public function pembayaran()
    {
        $data['tittle'] = 'Home';
        $this->load->model('invoice_model');
        $data['pembayaran'] = $this->invoice_model->kurir_invoice();
        $this->load->view('template_user/header');
        $this->load->view('template_user/sidebar', $data);
        $this->load->view('template_user/topbar');
        $this->load->view('template_user/pembayaran',$data);            
        $this->load->view('template_user/footer');
    }

    public function proses_pesanan()
    {
        $this->load->model('invoice_model');
        $is_processed = $this->invoice_model->index();
        if ($is_processed) {
            $this->cart->destroy();
            $this->load->view('template_user/header');
            $this->load->view('template_user/sidebar');
            $this->load->view('template_user/topbar');
            $this->load->view('template_user/proses_pesanan');            
            $this->load->view('template_user/footer');
        } else {
            echo "Pesanan Anda Gagal Diproses";
        }
    }

    public function detail_b($id_produk)
    {
        $data['tittle'] = 'Home';
        $this->load->model('Produk_model');
        $data['detail'] = $this->Produk_model->detail_brg($id_produk);
        $this->load->view('template_user/header');
        $this->load->view('template_user/sidebar',$data);
        $this->load->view('template_user/topbar');
        $this->load->view('template_user/detail_barang',$data);            
        $this->load->view('template_user/footer');
    }
}
