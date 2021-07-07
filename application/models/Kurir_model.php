<?php  
defined('BASEPATH') OR exit('No direct script access allowed');

class Kurir_model extends CI_Model
{
    public function LayananKurir()
    {
        $queryName ="SELECT kurir.* , layanan_kurir.nama_layanan 
                     FROM kurir,layanan_kurir
                    WHERE kurir.layanan_id = layanan_kurir.layanan_id 
                ";
        return $this->db->query($queryName)->result_array();
    }

    public function HapusKurir($kurir_id)
    {
        $this->db->where('kurir_id', $kurir_id);
        $this->db->delete('kurir');
    } 

}
