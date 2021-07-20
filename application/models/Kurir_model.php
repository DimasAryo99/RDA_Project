<?php  
defined('BASEPATH') OR exit('No direct script access allowed');

class Kurir_model extends CI_Model
{
    public function tampilan_kurir()
    {
        $queryName ="SELECT *
                     FROM kurir
                ";
        return $this->db->query($queryName)->result_array();
    }

    public function HapusKurir($kurir_id)
    {
        $this->db->where('kurir_id', $kurir_id);
        $this->db->delete('kurir');
    } 

}
