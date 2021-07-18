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
        //$this->load->model('Produk_model');
        //$produk = $this->Produk_model->find($id);
        $user=$this->db->get_where('pengguna',['email'=>$this->session->userdata('email')])->row_array();
        $toko=$this->db->get_where('produk',['id_produk'=>$id])->row_array();
        $data = [
            'id_produk'  => $id,
            'id_pengguna'=> $user['id_pengguna'],
            'jumlah'     => 1,
        ];
        $this->db->insert('keranjang',$data);
        redirect('home_user');
    }
    
    
    public function detail_keranjang()
    {
        $data['tittle'] = 'Home';
        $data['user'] =  $this->db->get_where('pengguna',['email' =>
        $this->session->userdata('email')])->row_array();
        
        $data['keranjang'] = $this->Produk_model->tampilan_keranjang()->result_array();
        $data['tampil'] = $this->Produk_model->tampil_jumlahkeranjang()->row_array();
        
        $this->load->view('template_user/header');
        $this->load->view('template_user/sidebar', $data);
        $this->load->view('template_user/topbar',$data);
        $this->load->view('template_user/keranjang',$data);            
        $this->load->view('template_user/footer');
    }
    
    public function hapus_keranjang($hapus)
    {
        $this->Produk_model->hapus_keranjang($hapus);
        $this->session->set_flashdata('flash', 'Dihapus'); 
        redirect('tampilan_user/detail_keranjang');
    }
    
    public function pembayaran()
    {
        $data['tittle'] = 'Home';
        $data['user'] =  $this->db->get_where('pengguna',['email' =>
        $this->session->userdata('email')])->row_array();
        
        $data['tampil'] = $this->Produk_model->tampil_jumlahkeranjang()->row_array();

        $this->load->model('invoice_model');
        $this->load->view('template_user/header');
        $this->load->view('template_user/sidebar', $data);
        $this->load->view('template_user/topbar',$data);
        $this->load->view('template_user/pembayaran',$data);            
        $this->load->view('template_user/footer');
    }

    public function proses_pesanan()
    {
        $data['tittle'] = 'Home';
        $data['user'] =  $this->db->get_where('pengguna',['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->model('invoice_model');

        $data['produk'] = $this->Produk_model->tampil_produk()->result();

        $data['tampil'] = $this->Produk_model->tampil_jumlahkeranjang()->row_array();
        $is_processed = $this->invoice_model->index();
        if ($is_processed) {
            $this->cart->destroy();
            $this->load->view('template_user/header');
            $this->load->view('template_user/sidebar',$data);
            $this->load->view('template_user/topbar',$data);
            $this->load->view('template_user/home',$data);            
            $this->load->view('template_user/footer');
        } else {
            echo "Pesanan Anda Gagal Diproses";
        }
    }

    public function detail_b($id_produk)
    {
        $data['tittle'] = 'Home';
        $data['detail'] = $this->Produk_model->detail_brg($id_produk);

        $data['tampil'] = $this->Produk_model->tampil_jumlahkeranjang()->row_array();

        $this->load->view('template_user/header');
        $this->load->view('template_user/sidebar',$data);
        $this->load->view('template_user/topbar');
        $this->load->view('template_user/detail_barang',$data);            
        $this->load->view('template_user/footer');
    }
}
