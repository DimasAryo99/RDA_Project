<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Superadmin extends CI_Controller
{
    public function index()
    {
        $data['tittle'] = 'Dashboard';
        $data['user'] =  $this->db->get_where('user',['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->model('Toko_model');
        $data['jtoko'] = $this->Toko_model->JumlahToko();
        
        $this->load->view('template/header',$data);
        $this->load->view('template/sidebar_superadmin',$data);
        $this->load->view('template/topbar_superadmin',$data);
        $this->load->view('admin/index',$data);
        $this->load->view('template/footer_superadmin');
    }

    public function toko()
    {
        $data['tittle'] = 'Toko';
        $data['user'] =  $this->db->get_where('user',['email' =>
        $this->session->userdata('email')])->row_array();
        
        $this->load->model('Toko_model','name');
        $data['listoko'] = $this->name->PemilikToko();

        $data['pemilik'] = $this->db->get('admin_toko')->result_array();

        //form validation tambah toko
        $this->form_validation->set_rules('admin_id', 'Pemilik', 'required', [
            'is_unique' => 'Pemilik has already registered!']);
        $this->form_validation->set_rules('nama_toko', 'Nama toko', 'required');
        $this->form_validation->set_rules('deskripsi_toko', 'Deskripsi toko', 'required');
        $this->form_validation->set_rules('alamat_toko', 'Alamat toko', 'required');

        //method tambah toko
        if($this->form_validation->run() ==  false)
        {
        $this->load->view('template/header',$data);
        $this->load->view('template/sidebar_superadmin',$data);
        $this->load->view('template/topbar_superadmin',$data);
        $this->load->view('toko/index',$data);
        $this->load->view('template/footer_superadmin');
        }
        else
        {
            $data= 
            [
                'nama_toko' => $this->input->post('nama_toko'),
                'deskripsi_toko' => $this->input->post('deskripsi_toko'),
                'alamat_toko' => $this->input->post('alamat_toko'),
            ];
        $this->db->insert('toko', $data);
            $data2= 
            [
                'admin_id' => $this->input->post('admin_id'),
            ];
        $this->db->insert('admin_toko', $data2);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
         Baru Berhasil ditambah</div>');
        redirect('Superadmin/toko');
        }
    }

    public function editoko($toko_id)
    {
        $data['tittle'] = 'Toko';
        $data['user'] =  $this->db->get_where('user',['email' =>
        $this->session->userdata('email')])->row_array();
        
        $this->load->model('Toko_model','name');
        $data['listoko'] = $this->name->PemilikToko();

        $where = array('toko_id' =>$toko_id);
        $this->load->model('Toko_model');
        $data['toko'] = $this->Toko_model->edit_toko($where,'toko')->result();
        $this->load->view('template/header',$data);
        $this->load->view('template/sidebar_superadmin',$data);
        $this->load->view('template/topbar_superadmin',$data);
        $this->load->view('toko/edit_toko',$data);
        $this->load->view('template/footer_superadmin');
    }

    public function updatetoko()
    {
        $tokid          = $this->input->post('toko_id');
        $namatoko       = $this->input->post('nama_toko');
        $deskripsitoko  = $this->input->post('deskripsi_toko');
        $alamatoko      = $this->input->post('alamat_toko');

        $data = [
            'nama_toko'     => $namatoko,
            'deskripsi_toko'    => $deskripsitoko,
            'alamat_toko'      => $alamatoko,
        ];

        $where = [
            'toko_id'     => $tokid
        ];
        $this->load->model('Toko_model');
        $this->Toko_model->update_toko($where, $data,'toko');
        redirect('Superadmin?toko');
    }

    //method hapus toko
    public function hapustoko($id)
    {
        $this->load->model('Toko_model');
        $this->Toko_model->HapusToko($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('Superadmin/toko');
    }

    public function listkategori()
    {
        $data['tittle'] = 'Kategori';
        $data['user'] =  $this->db->get_where('user',['email' =>
        $this->session->userdata('email')])->row_array();
        
        $data['liskategori'] = $this->db->get('kategori')->result_array();

        $this->form_validation->set_rules('kategori', 'Kategori', 'required');

        if($this->form_validation->run() ==  false)
        {
            $this->load->view('template/header',$data);
            $this->load->view('template/sidebar_superadmin',$data);
            $this->load->view('template/topbar_superadmin',$data);
            $this->load->view('listkategori/index',$data);
            $this->load->view('template/footer_superadmin');
        }
        else
        {
            $this->db->insert('kategori', 
            ['nama_kategori' => $this->input->post('kategori')]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Kategori Baru Berhasil ditambah</div>');
            redirect('Superadmin/listkategori');
        }

    }

    //method hapus kategori
    public function hapuskategori($kategori_id)
    {
        $this->load->model('Kategori_model');
        $this->Kategori_model->HapusKategori($kategori_id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('Superadmin/listkategori');
    }

    public function kurir()
    {
        $data['tittle'] = 'Kurir';
        $data['user'] =  $this->db->get_where('user',['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->model('Kurir_model');
        $data['kurir'] = $this->Kurir_model->tampilan_kurir();

        //form validation tambah kurir
        $this->form_validation->set_rules('nama_kurir', 'Nama Kurir', 'required');
        $this->form_validation->set_rules('layanan_kurir', 'Layanan Kurir', 'required');
        $this->form_validation->set_rules('ongkos_kurir', 'Ongkos Kurir', 'required');

        if($this->form_validation->run() ==  false)
        {
        $this->load->view('template/header',$data);
        $this->load->view('template/sidebar_superadmin',$data);
        $this->load->view('template/topbar_superadmin',$data);
        $this->load->view('kurir/index',$data);
        $this->load->view('template/footer_superadmin');
        }
        else
        {
                $data= 
                [
                    'nama_kurir' => $this->input->post('nama_kurir'),
                    'layanan_kurir' => $this->input->post('layanan_kurir'),
                    'ongkos_kurir' => $this->input->post('ongkos_kurir'),
                ];
            $this->db->insert('kurir', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Baru Berhasil ditambah</div>');
            redirect('Superadmin/kurir');
        }
    }

     //method hapus kurir
     public function hapuskurir($kurir_id)
     {
         $this->load->model('Kurir_model');
         $this->Kurir_model->HapusKurir($kurir_id);
         $this->session->set_flashdata('flash', 'Dihapus');
         redirect('Superadmin/kurir');
     }

     public function tampil_invoice()
     {
        $data['tittle'] = 'Invoice';
        $data['user'] =  $this->db->get_where('user',['email' =>
        $this->session->userdata('email')])->row_array();

         $data['invoice'] = $this->invoice_model->tampil_data();
         $this->load->view('template/header',$data);
         $this->load->view('template/sidebar_superadmin',$data);
         $this->load->view('template/topbar_superadmin',$data);
         $this->load->view('invoice/index',$data);
         $this->load->view('template/footer_superadmin');
     }

     public function detail($id_invoice)
     {
        $data['tittle'] = 'Invoice';
        $data['user'] =  $this->db->get_where('user',['email' =>
        $this->session->userdata('email')])->row_array();

         $data['invoice'] = $this->invoice_model->ambil_id_invoice($id_invoice);
         $data['pesanan'] = $this->invoice_model->ambil_id_pesanan($id_invoice);
         $this->load->view('template/header',$data);
         $this->load->view('template/sidebar_superadmin',$data);
         $this->load->view('template/topbar_superadmin',$data);
         $this->load->view('invoice/detail',$data);
         $this->load->view('template/footer_superadmin');
     }

} 
