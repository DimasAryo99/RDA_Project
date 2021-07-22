<?php

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
        $data= $this->db->query("SELECT *, SUM(produk.harga_produk * tb_pesanan.jumlah) AS Pendapatan
        FROM tb_pesanan, produk, tb_invoice ,toko
        WHERE tb_pesanan.id_produk = produk.id_produk
        AND tb_pesanan.id_invoice = tb_invoice.id_invoice 
        AND tb_pesanan.toko_id = tb_pesanan.toko_id 
        AND tgl_pesan BETWEEN '$awal' AND '$akhir' 
        GROUP BY toko.toko_id ASC");
        return $data->result();
    }


}