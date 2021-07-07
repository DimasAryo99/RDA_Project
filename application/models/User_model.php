<?php  
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model
{
    public function ProfileToko()
    {
        $this->db->select('toko.*');
        $this->db->from('toko');
        $this->db->join('admin_toko','toko.toko_id = admin_toko.toko_id');
        $this->db->where('admin_toko.email_admin',$this->session->userdata('email_admin'));
        return $this->db->get();
    }
    public function ProdukToko()
    {
        $this->db->select('produk.*');
        $this->db->from('produk');
        $this->db->join('toko','toko.toko_id = produk.toko_id');
        $this->db->join('admin_toko','admin_toko.toko_id = toko.toko_id');
        $this->db->where('admin_toko.email_admin',$this->session->userdata('email_admin'));
        return $this->db->get();
    }
}