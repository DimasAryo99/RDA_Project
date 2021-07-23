<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Superadmin extends CI_Controller
{
    public function index()
    {
        $data['tittle'] = 'Dashboard';
        $data['user'] =  $this->db->get_where('user',['email' =>
        $this->session->userdata('email')])->row_array();

        /*$data['tampilan'] = $this->invoice_model->tampil_konfirmasi();
        $data['tampilan2'] = $this->invoice_model->tampil_kirim();
        $data['tampilan2'] = $this->invoice_model->tampil_kirim();*/
        
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
        Toko Berhasil ditambah</div>');
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
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
         Toko berhasil ditambah</div>');
        redirect('Superadmin/toko');
    }

    //method hapus toko
    public function hapustoko($id)
    {
        $this->load->model('Toko_model');
        $this->Toko_model->HapusToko($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Toko berhasil dihapus </div>');
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
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Kategori berhasil dihapus</div>');
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
            Kurir Berhasil ditambah</div>');
            redirect('Superadmin/kurir');
        }
    }

     //method hapus kurir
     public function hapuskurir($kurir_id)
     {
         $this->load->model('Kurir_model');
         $this->Kurir_model->HapusKurir($kurir_id);
         $this->session->set_flashdata('flash', 'Dihapus');
         $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
         Kurir Berhasil Dihapus</div>');
         redirect('Superadmin/kurir');
     }

     public function tampil_invoice()
     {
        $data['tittle'] = 'Invoice';
        $data['user'] =  $this->db->get_where('user',['email' =>
        $this->session->userdata('email')])->row_array();

         $data['invoice'] = $this->invoice_model->tampil_invoice_superadmin();
         $this->load->view('template/header',$data);
         $this->load->view('template/sidebar_superadmin',$data);
         $this->load->view('template/topbar_superadmin',$data);
         $this->load->view('admin/invoice',$data);
         $this->load->view('template/footer_superadmin');
     }

     public function detail_invoice($id)
     {
        $data['tittle'] = 'Invoice';
        $data['user'] =  $this->db->get_where('user',['email' =>
        $this->session->userdata('email')])->row_array();

        $data['pesanan'] = $this->invoice_model->tampil_detail_superadmin($id);
        $data['pesanan2'] = $this->invoice_model->tampil_detail_superadmin2($id);
        $data['invoice'] = $this->invoice_model->tampil_foto($id);
         $this->load->view('template/header',$data);
         $this->load->view('template/sidebar_superadmin',$data);
         $this->load->view('template/topbar_superadmin',$data);
         $this->load->view('admin/detail',$data);
         $this->load->view('template/footer_superadmin');
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

     public function laporan()
     {
        $data['tittle'] = 'Laporan';
        $data['user'] =  $this->db->get_where('user',['email' =>
        $this->session->userdata('email')])->row_array();

        $data['tahun'] = $this->laporan_model->getTahun();
        $this->load->view('template/header');
        $this->load->view('template/sidebar_superadmin',$data);
        $this->load->view('template/topbar_superadmin',$data);
        $this->load->view('admin/laporan', $data);
        $this->load->view('template/footer_superadmin');
     }

     function filter()
     {
        $awal = $this->input->post('awal');
        $akhir = $this->input->post('akhir');
        $tahun1 = $this->input->post('tahun1');
        $bulanawal = $this->input->post('bulanawal');
        $bulanakhir = $this->input->post('bulanakhir');
        $tahun2 = $this->input->post('tahun2');
        $nilai = $this->input->post('nilai');

        if($nilai == 1)
        {
            $data['tittle'] = 'Laporan';
            $data['user'] =  $this->db->get_where('user',['email' =>
            $this->session->userdata('email')])->row_array();
            $data['datafilter'] = $this->laporan_model->filterTanggal($awal,$akhir)->result();

            $this->load->view('template/header');
            $this->load->view('template/sidebar_superadmin',$data);
            $this->load->view('template/topbar_superadmin',$data);
            $this->load->view('admin/print_laporan', $data);
            $this->load->view('template/footer_superadmin');
        }
        
        elseif($nilai == 2)
        {
            $data['tittle'] = 'Laporan';
            $data['user'] =  $this->db->get_where('user',['email' =>
            $this->session->userdata('email')])->row_array();
            $data['datafilter'] = $this->laporan_model->filterBulan($tahun1, $bulanawal, $bulanakhir)->result();

            $this->load->view('template/header');
            $this->load->view('template/sidebar_superadmin',$data);
            $this->load->view('template/topbar_superadmin',$data);
            $this->load->view('admin/print_laporan', $data);
            $this->load->view('template/footer_superadmin');
        }

        else
        {
            $data['tittle'] = 'Laporan';
            $data['user'] =  $this->db->get_where('user',['email' =>
            $this->session->userdata('email')])->row_array();
            $data['datafilter'] = $this->laporan_model->filterTahun($tahun2)->result();

            $this->load->view('template/header');
            $this->load->view('template/sidebar_superadmin',$data);
            $this->load->view('template/topbar_superadmin',$data);
            $this->load->view('admin/print_laporan', $data);
            $this->load->view('template/footer_superadmin');
        }
     
     /*
     public function transaksi()
     {
        if(isset($_GET['filter']) && ! empty($_GET['filter'])){ // Cek apakah user telah memilih filter dan klik tombol tampilkan
            $filter = $_GET['filter']; // Ambil data filder yang dipilih user
            if($filter == '1'){ // Jika filter nya 1 (per tanggal)
                $tgl = $_GET['tanggal'];
                
                $ket = 'Data Transaksi Tanggal '.date('d-m-y', strtotime($tgl));
                $url_cetak = 'transaksi/cetak?filter=1&tanggal='.$tgl;
                $transaksi = $this->TransaksiModel->view_by_date($tgl); // Panggil fungsi view_by_date yang ada di TransaksiModel
            
            }else if($filter == '2'){ // Jika filter nya 2 (per bulan)
                $bulan = $_GET['bulan'];
                $tahun = $_GET['tahun'];
                $nama_bulan = array('', 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
                
                $ket = 'Data Transaksi Bulan '.$nama_bulan[$bulan].' '.$tahun;
                $url_cetak = 'transaksi/cetak?filter=2&bulan='.$bulan.'&tahun='.$tahun;
                $transaksi = $this->TransaksiModel->view_by_month($bulan, $tahun); // Panggil fungsi view_by_month yang ada di TransaksiModel
            
            }else{ // Jika filter nya 3 (per tahun)
                $tahun = $_GET['tahun'];
                
                $ket = 'Data Transaksi Tahun '.$tahun;
                $url_cetak = 'transaksi/cetak?filter=3&tahun='.$tahun;
                $transaksi = $this->TransaksiModel->view_by_year($tahun); // Panggil fungsi view_by_year yang ada di TransaksiModel
            }
        
        }else{ // Jika user tidak mengklik tombol tampilkan
            $ket = 'Semua Data Transaksi';
            $url_cetak = 'Superadmin/cetak_transaksi';
            $transaksi = $this->TransaksiModel->view_all(); // Panggil fungsi view_all yang ada di TransaksiModel
        }
        
        $data['ket'] = $ket;
        $data['url_cetak'] = base_url('/'.$url_cetak);
        $data['transaksi'] = $transaksi;
        $data['option_tahun'] = $this->TransaksiModel->option_tahun();
        $data['tittle'] = 'Laporan';
        $data['user'] =  $this->db->get_where('user',['email' =>
        $this->session->userdata('email')])->row_array();

         $this->load->view('template/header',$data);
         $this->load->view('template/sidebar_superadmin',$data);
         $this->load->view('template/topbar_superadmin',$data);
         $this->load->view('admin/transaksi',$data);
         $this->load->view('template/footer_superadmin');
  }


  
  public function cetak_transaksi()
  {
        if(isset($_GET['filter']) && ! empty($_GET['filter'])){ // Cek apakah user telah memilih filter dan klik tombol tampilkan
            $filter = $_GET['filter']; // Ambil data filder yang dipilih user
            if($filter == '1'){ // Jika filter nya 1 (per tanggal)
                $tgl = $_GET['tanggal'];
                
                $ket = 'Data Transaksi Tanggal '.date('d-m-y', strtotime($tgl));
                $transaksi = $this->TransaksiModel->view_by_date($tgl); // Panggil fungsi view_by_date yang ada di TransaksiModel
            
            }else if($filter == '2'){ // Jika filter nya 2 (per bulan)
                $bulan = $_GET['bulan'];
                $tahun = $_GET['tahun'];
                $nama_bulan = array('', 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
                
                $ket = 'Data Transaksi Bulan '.$nama_bulan[$bulan].' '.$tahun;
                $transaksi = $this->TransaksiModel->view_by_month($bulan, $tahun); // Panggil fungsi view_by_month yang ada di TransaksiModel
            
            }else{ // Jika filter nya 3 (per tahun)
                $tahun = $_GET['tahun'];
                
                $ket = 'Data Transaksi Tahun '.$tahun;
                $transaksi = $this->TransaksiModel->view_by_year($tahun); // Panggil fungsi view_by_year yang ada di TransaksiModel
            }
        
        }else{ // Jika user tidak mengklik tombol tampilkan
            $ket = 'Semua Data Transaksi';
            $transaksi = $this->TransaksiModel->view_all(); // Panggil fungsi view_all yang ada di TransaksiModel
        }
        $data['ket'] = $ket;
        $data['transaksi'] = $transaksi;
        
    ob_start();
    $this->load->view('admin/print', $data);
    $html = ob_get_contents();
        ob_end_clean();
        
    require './asset/pdf/autoload.php'; // Load plugin html2pdfnya
    $pdf = new Spipu\Html2Pdf\Html2Pdf('P','A4','en');  // Settingan PDFnya
    $pdf->WriteHTML($html);
    $pdf->Output('Data Transaksi.pdf', 'D');
  }*/

    } 
}