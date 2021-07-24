<?php  
defined('BASEPATH') OR exit('No direct script access allowed');

class Toko_model extends CI_Model
{
    public function PemilikToko()
    {
        $queryName ="SELECT toko.* , admin_toko.admin_id , admin_toko.name_admin  
                     FROM toko,admin_toko
                    WHERE toko.toko_id = admin_toko.toko_id 
                    ORDER BY admin_toko.toko_id ASC
                ";
        return $this->db->query($queryName)->result_array();
    }

    public function PemilikToko2()
    {
        $queryName ="SELECT * 
                     FROM admin_toko
                ";
        return $this->db->query($queryName)->result_array();
    }

    public function HapusToko($id)
    {
        $this->db->where('toko_id', $id);
        $this->db->delete('toko');
    } 

    public function JumlahToko()
    {
        $queryName1 = "SELECT SUM(toko_id) AS Total
                       FROM toko            
                      ";
        return $this->db->query($queryName1)->result_array();   
    }

    public function edit_toko($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function update_toko($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
        
}
