<?php  
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_model extends CI_Model
{
    public function HapusKategori($kategori_id)
    {
        $this->db->where('kategori_id', $kategori_id);
        $this->db->delete('kategori');
    }

    public function laptopkategori()
    {
        $this->db->select('*');
        $this->db->from('produk');
        $this->db->join('kategori','kategori.kategori_id = produk.kategori_id');
        $this->db->where('produk.kategori_id = 9');
        return $this->db->get();
    }

    public function handphonekategori()
    {
        $this->db->select('*');
        $this->db->from('produk');
        $this->db->join('kategori','kategori.kategori_id = produk.kategori_id');
        $this->db->where('produk.kategori_id = 10');
        return $this->db->get();
    }

    public function earphonekategori()
    {
        $this->db->select('*');
        $this->db->from('produk');
        $this->db->join('kategori','kategori.kategori_id = produk.kategori_id');
        $this->db->where('produk.kategori_id = 11');
        return $this->db->get();
    }

    public function astorekategori()
    {
        $this->db->select('*');
        $this->db->from('produk');
        $this->db->join('toko','toko.toko_id = produk.toko_id');
        $this->db->where('produk.toko_id = 11');
        return $this->db->get();
    }

    public function dstorekategori()
    {
        $this->db->select('*');
        $this->db->from('produk');
        $this->db->join('toko','toko.toko_id = produk.toko_id');
        $this->db->where('produk.toko_id = 12');
        return $this->db->get();
    }

    public function istorekategori()
    {
        $this->db->select('*');
        $this->db->from('produk');
        $this->db->join('toko','toko.toko_id = produk.toko_id');
        $this->db->where('produk.toko_id = 15');
        return $this->db->get();
    }



}