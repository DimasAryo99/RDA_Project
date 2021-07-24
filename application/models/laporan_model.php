<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class laporan_model extends CI_Model
{

    public function getTahun()
    {
        $data= $this->db->query("SELECT YEAR(tgl_pesan) AS Tahun 
                                FROM tb_pesanan,tb_invoice
                                WHERE tb_invoice.id_invoice = tb_pesanan.id_invoice  
                                GROUP BY YEAR(tgl_pesan) 
                                ORDER BY YEAR(tgl_pesan) ASC"
                                );
        return $data->result();
    }

    public function filterTanggal($awal,$akhir)
    {
        $query = "SELECT DATE_FORMAT(tb_invoice.tgl_pesan, '%D''%M''%Y') as tanggal 
        , SUM(produk.harga_produk * tb_pesanan.jumlah) AS pendapatan, toko.nama_toko
        FROM tb_pesanan, produk, tb_invoice ,toko
        WHERE tb_pesanan.id_produk = produk.id_produk
        AND tb_pesanan.id_invoice = tb_invoice.id_invoice 
        AND produk.toko_id = toko.toko_id
        AND date(tgl_pesan) BETWEEN '$awal' AND '$akhir'
        GROUP BY tb_invoice.tgl_pesan
        ORDER BY tb_invoice.tgl_pesan ASC"
        ;
        return $this->db->query($query);
    }

    public function filterTanggaltoko($awal,$akhir)
    {
        $tes= $this->session->userdata('email_admin');
        $query = "SELECT DATE_FORMAT(tb_invoice.tgl_pesan, '%D' '%M' '%Y') as tanggal 
        , SUM(produk.harga_produk * tb_pesanan.jumlah) AS pendapatan, toko.nama_toko
        FROM tb_pesanan, produk, tb_invoice ,toko, admin_toko
        WHERE tb_pesanan.id_produk = produk.id_produk
        AND tb_pesanan.id_invoice = tb_invoice.id_invoice 
        AND produk.toko_id = toko.toko_id 
        AND toko.toko_id = admin_toko.toko_id
        AND date(tgl_pesan) BETWEEN '$awal' AND '$akhir'
        AND admin_toko.email_admin = '$tes'
        GROUP BY tb_invoice.tgl_pesan 
        ORDER BY tb_invoice.tgl_pesan ASC"
        ;
        return $this->db->query($query);
    }

    public function filterBulan($tahun1, $bulanawal,$bulanakhir)
    /*AND produk.toko_id = toko.toko_id*/
    {
        $query = "SELECT DATE_FORMAT(tb_invoice.tgl_pesan, '%M' '%Y') as tanggal 
        , produk.harga_produk * tb_pesanan.jumlah AS pendapatan, toko.nama_toko
        FROM tb_pesanan, produk, tb_invoice, toko
        WHERE tb_pesanan.id_produk = produk.id_produk
        AND tb_pesanan.id_invoice = tb_invoice.id_invoice
        AND produk.toko_id = toko.toko_id 
        AND year(tb_invoice.tgl_pesan) = '$tahun1' 
        AND month(tb_invoice.tgl_pesan) BETWEEN '$bulanawal' AND '$bulanakhir'
        GROUP BY MONTH(tb_invoice.tgl_pesan) 
        ORDER BY tb_invoice.tgl_pesan ASC"
        ;
        return $this->db->query($query);
    }

    public function filterBulantoko($tahun1, $bulanawal,$bulanakhir)
    {
        $tes= $this->session->userdata('email_admin');
        $query = "SELECT DATE_FORMAT(tb_invoice.tgl_pesan, '%M' '%Y') as tanggal 
        , SUM(produk.harga_produk * tb_pesanan.jumlah) AS pendapatan, toko.nama_toko
        FROM tb_pesanan, produk, tb_invoice ,toko ,admin_toko
        WHERE tb_pesanan.id_produk = produk.id_produk
        AND tb_pesanan.id_invoice = tb_invoice.id_invoice 
        AND produk.toko_id = toko.toko_id
        AND YEAR(tgl_pesan) = '$tahun1' 
        AND toko.toko_id = admin_toko.toko_id
        AND MONTH(tgl_pesan) BETWEEN '$bulanawal' AND '$bulanakhir'
        AND admin_toko.email_admin = '$tes'
        GROUP BY MONTH(tb_invoice.tgl_pesan) 
        ORDER BY tb_invoice.tgl_pesan ASC"
        ;
        return $this->db->query($query);
    }
    
    public function filterTahun($tahun2)
    {
        $query = "SELECT DATE_FORMAT(tb_invoice.tgl_pesan, '%Y') as tanggal 
        , SUM(produk.harga_produk * tb_pesanan.jumlah) AS pendapatan, toko.nama_toko
        FROM tb_pesanan, produk, tb_invoice ,toko
        WHERE tb_pesanan.id_produk = produk.id_produk
        AND tb_pesanan.id_invoice = tb_invoice.id_invoice 
        AND produk.toko_id = toko.toko_id
        AND YEAR(tgl_pesan) = '$tahun2'
        GROUP BY YEAR(tb_invoice.tgl_pesan) 
        ORDER BY tb_invoice.tgl_pesan ASC" 
        ;
        return $this->db->query($query);
    }

    public function filterTahuntoko($tahun2)
    {
        $tes= $this->session->userdata('email_admin');
        $query = "SELECT DATE_FORMAT(tb_invoice.tgl_pesan, '%Y') as tanggal 
        , SUM(produk.harga_produk * tb_pesanan.jumlah) AS pendapatan, toko.nama_toko
        FROM tb_pesanan, produk, tb_invoice ,toko ,admin_toko
        WHERE tb_pesanan.id_produk = produk.id_produk
        AND tb_pesanan.id_invoice = tb_invoice.id_invoice 
        AND produk.toko_id = toko.toko_id  
        AND toko.toko_id = admin_toko.toko_id
        AND YEAR(tgl_pesan) = '$tahun2'
        AND admin_toko.email_admin = '$tes'
        GROUP BY YEAR(tb_invoice.tgl_pesan) 
        ORDER BY tb_invoice.tgl_pesan ASC" 
        ;
        return $this->db->query($query);
    }

}