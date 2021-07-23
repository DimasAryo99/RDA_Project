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
        $cek=$this->Produk_model->tampil_updatekeranjang($id,$user['id_pengguna'])->row_array();
        if(!$cek)
        {
            $data = [
                'id_produk'  => $id,
                'toko_id'    => $toko['toko_id'],
                'id_pengguna'=> $user['id_pengguna'],
                'jumlah'     => 1,
            ]; 
            $this->db->insert('keranjang',$data);
            redirect('home_user');
        }
        else
        {
            $where = [
                'id_produk'  => $id,
            ];
            $data = [
                'toko_id'    => $toko['toko_id'],
                'id_pengguna'=> $user['id_pengguna'],
                'jumlah'     => $cek['jumlah']+1,
            ]; 
            $this->db->where($where);
            $this->db->update('keranjang',$data);
            redirect('home_user');
        }
    }

        
    public function detail_keranjang()
    {
        $data['tittle'] = 'Detail Keranjang';
        $data['user'] =  $this->db->get_where('pengguna',['email' =>
        $this->session->userdata('email')])->row_array();
        
        $data['keranjang'] = $this->Produk_model->tampilan_keranjang()->result_array();
        $data['tampil'] = $this->Produk_model->tampil_jumlahkeranjang()->row_array();
        $data['tampil1'] = $this->invoice_model->tampil_jumlahinvoice()->row_array();
        
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
        $data['tampil1'] = $this->invoice_model->tampil_jumlahinvoice()->row_array();
        $data['kurir'] = $this->Kurir_model->tampilan_kurir();
        $this->load->model('invoice_model');
        $this->load->view('template_user/header');
        $this->load->view('template_user/sidebar', $data);
        $this->load->view('template_user/topbar',$data);
        $this->load->view('template_user/pembayaran',$data);            
        $this->load->view('template_user/footer');
    }
    
    public function tambah_invoice()
    {
        date_default_timezone_set('Asia/Jakarta');
        $user=$this->db->get_where('pengguna',['email'=>$this->session->userdata('email')])->row_array();
        $cek=$this->Produk_model->simpan_pesanan($user['id_pengguna'])->result_array();
        $invoice    = [
            'nama'          => $this->input->post('nama'),
            'alamat'        => $this->input->post('alamat'),
            'nomor_telepon' => $this->input->post('no_telp'),
            'kurir_id'      => $this->input->post('kurir_id'),
            'tgl_pesan'     => date('Y-m-d H:i:s'),
            'batas_bayar'   => date('Y-m-d H:i:s', mktime(date('H'), date('i'), date('s'), date('m'), date('d') + 1, date('Y'))),
            'id_pengguna'   => $user['id_pengguna'],
            'bank'          => $this->input->post('bank'),
            
        ];
        $this->db->insert('tb_invoice', $invoice);
        $id_invoice = $this->db->insert_id();

        foreach($cek as $c)
        {
            $data= [
                'id_invoice'    => $id_invoice,
                'id_produk'     => $c['id_produk'],
                'jumlah'        => $c['jumlah'],   
            ];
            //masuk database pesanan
            $this->db->insert('tb_pesanan', $data);
            //destroy keranjang
            $this->Produk_model->destroykeranjang($c['id_keranjang']);

            //taro kurang stok
            $produk=$this->db->get_where('produk',['id_produk'=>$c['id_produk']])->row_array();

            $hasil = $produk['stok_produk'] - $c['jumlah'];
            
            $this->db->set('stok_produk',$hasil);
            $this->db->where('id_produk',$produk['id_produk']);
            $this->db->update('produk');
        }
        $this->session->set_flashdata('flash', 'Dihapus'); 
        redirect('home_user/index');

    }

    public function proses_pesanan()
    {
        $data['tittle'] = 'Home';
        $data['user'] =  $this->db->get_where('pengguna',['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->model('invoice_model');
        
        $data['produk'] = $this->Produk_model->tampil_produk()->result();

        $data['tampil'] = $this->Produk_model->tampil_jumlahkeranjang()->row_array();
        $data['tampil1'] = $this->invoice_model->tampil_jumlahinvoice()->row_array();
        $is_processed = $this->model_invoice->index();
        if ($is_processed) 
        {
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
        $data['user'] =  $this->db->get_where('pengguna',['email' =>
        $this->session->userdata('email')])->row_array();

        $data['tampil'] = $this->Produk_model->tampil_jumlahkeranjang()->row_array();
        $data['tampil1'] = $this->invoice_model->tampil_jumlahinvoice()->row_array();

        $this->load->view('template_user/header');
        $this->load->view('template_user/sidebar',$data);
        $this->load->view('template_user/topbar',$data);
        $this->load->view('template_user/detail_barang',$data);            
        $this->load->view('template_user/footer');
    }

    public function tampilan_invoice()
    {
        $data['tittle'] = 'Invoice';
        $data['user'] =  $this->db->get_where('pengguna',['email' =>
        $this->session->userdata('email')])->row_array();

        $data['tampil'] = $this->Produk_model->tampil_jumlahkeranjang()->row_array();
        $data['tampil1'] = $this->invoice_model->tampil_jumlahinvoice()->row_array();
        $data['invoice'] = $this->invoice_model->tampil_invoice_user()->result_array();

        $this->load->view('template_user/header');
        $this->load->view('template_user/sidebar',$data);
        $this->load->view('template_user/topbar',$data);
        $this->load->view('template_user/invoice',$data);            
        $this->load->view('template_user/footer');
    }
    
    public function detail_invoice($id)
    {
        $data['tittle'] = 'Invoice';
        $data['user'] =  $this->db->get_where('pengguna',['email' =>
        $this->session->userdata('email')])->row_array();

        $data['tampil'] = $this->Produk_model->tampil_jumlahkeranjang()->row_array();
        $data['tampil1'] = $this->invoice_model->tampil_jumlahinvoice()->row_array();
        
        $data['pesanan'] = $this->invoice_model->tampil_detail_user($id);
        $data['pesanan2'] = $this->invoice_model->tampil_detail_user2($id);
        $data['invoice'] = $this->invoice_model->tampil_foto($id);

        $this->load->view('template_user/header');
        $this->load->view('template_user/sidebar',$data);
        $this->load->view('template_user/topbar',$data);
        $this->load->view('template_user/detail_invoice',$data);            
        $this->load->view('template_user/footer');
    }

    public function update_invoice()
     {
        $idinvoice = $this->input->post('id_invoice');
        $status= $this->input->post('status_invoice');
        $data = [
            'status_invoice'  => $status,
        ];
        $where = [
            'id_invoice'     => $idinvoice
        ];
        $this->invoice_model->update_buktibayar($where, $data,'tb_invoice');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Status Berhasil Diubah</div>');
        redirect('Superadmin/tampil_invoice');
     }

    public function upload_buktibayar()
    {
        $idinvoice = $this->input->post('id_invoice');
        $foto = $_FILES['foto']['name'];
        if ($foto) 
        {
            $config['upload_path'] = './asset/img/buktibayar/';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $this->load->library('upload', $config);
            
            if ($this->upload->do_upload('foto'))
            {
                $foto = $this->upload->data('file_name');
            }
        }

        $data = [
            'foto'     => $foto,
            'status_invoice'  => 'menunggu Konfirmasi',
        ];

        $where = [
            'id_invoice'     => $idinvoice
        ];
        $this->invoice_model->update_buktibayar($where, $data,'tb_invoice');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                            Berhasil Upload Bukti Bayar</div>');
        redirect('tampilan_user/tampilan_invoice');
    }

    
}
