<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admintoko extends CI_Controller
{
    public function index()
    {
        $data['tittle'] = 'Toko';
        $data['admin_toko'] =  $this->db->get_where('admin_toko',['email_admin' =>
        $this->session->userdata('email_admin')])->row_array();

        $this->load->model('User_model');
        $data['profile'] = $this->User_model->ProfileToko()->result();

        $this->load->view('template/header',$data);
        $this->load->view('template/sidebar_admintoko',$data);
        $this->load->view('template/topbar_admintoko',$data);
        $this->load->view('user/index',$data);
        $this->load->view('template/footer_admintoko');
    }

    public function produk()
    {
        $data['tittle'] = 'Produk';
        $data['admin_toko'] =  $this->db->get_where('admin_toko',['email_admin' =>
        $this->session->userdata('email_admin')])->row_array();

        $this->load->model('Produk_model');
        $data['kategori'] = $this->Produk_model->kategori();

        $this->load->model('User_model');
        $data['produk'] = $this->User_model->ProdukToko()->result();
        
        $data['toko'] =  $this->db->get_where('toko',['toko_id' =>
        $data['admin_toko']['toko_id']])->row_array();


        $this->load->view('template/header',$data);
        $this->load->view('template/sidebar_admintoko',$data);
        $this->load->view('template/topbar_admintoko',$data);
        $this->load->view('produk/index',$data);
        $this->load->view('template/footer_admintoko');
    }

    public function tambah_produk()
    {
        $kategori_id = $this->input->post('kategori_id');
        $nama_produk = $this->input->post('nama');
        $ket_produk = $this->input->post('ket');
        $harga_produk = $this->input->post('harga');
        $berat_produk = $this->input->post('berat');
        $stok_produk = $this->input->post('stok');
        $toko_id = $this->input->post('toko_id');
        $gambar_produk = $_FILES['gambar_produk']['name'];
        if ($gambar_produk) 
        {
            $config['upload_path'] = './asset/img/produk/';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $this->load->library('upload', $config);
            
            if ($this->upload->do_upload('gambar_produk'))
            {
                $gambar_produk = $this->upload->data('file_name');
            }
            else 
            {
                echo $this->upload->display_errors();

            }
        }

        $data =[
            'kategori_id' => $kategori_id,
            'nama_produk'      => $nama_produk,
            'ket_produk'       => $ket_produk,
            'harga_produk'      => $harga_produk,
            'berat_produk'         => $berat_produk,
            'stok_produk'          => $stok_produk,
            'toko_id'       => $toko_id,
            'gambar_produk' => $gambar_produk,
        ];
        $this->load->model('Produk_model');
        $this->Produk_model->tambah_produk($data, 'produk');
        redirect('Admintoko/produk');
    }

    public function edit_produk($produk_id)
    {
        $data['tittle'] = 'Produk';
        $data['admin_toko'] =  $this->db->get_where('admin_toko',['email_admin' =>
        $this->session->userdata('email_admin')])->row_array();

        $where = array('id_produk' =>$produk_id);
        $this->load->model('Produk_model');
        $data['produk'] = $this->Produk_model->edit_produk($where,'produk')->result();

        $this->load->view('template/header',$data);
        $this->load->view('template/sidebar_admintoko',$data);
        $this->load->view('template/topbar_admintoko',$data);
        $this->load->view('produk/edit_produk',$data);
        $this->load->view('template/footer_admintoko');
    }

    public function updateproduk()
    {
        $produkid          = $this->input->post('id_produk');
        $nama_produk       = $this->input->post('nama_produk');
        $keterangan_produk  = $this->input->post('ket_produk');
        $harga_produk     = $this->input->post('harga_produk');
        $berat_produk       = $this->input->post('berat_produk');
        $stok_produk  = $this->input->post('stok_produk');


        $data = [
            'nama_produk'     => $nama_produk,
            'ket_produk'    => $keterangan_produk,
            'harga_produk'      => $harga_produk,
            'berat_produk'     => $berat_produk,
            'stok_produk'    => $stok_produk,
        ];

        $where = [
            'id_produk'     => $produkid
        ];
        $this->load->model('Produk_model');
        $this->Produk_model->update_produk($where, $data,'produk');
        redirect('Admintoko/produk');
    }

    public function hapus_produk($produkid)
    {
        $this->load->model('Produk_model');
        $this->Produk_model->HapusKurir($produkid);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('Admintoko/produk');   
    }

} 