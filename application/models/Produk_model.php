<?php

class Produk_model extends CI_Model
{
    public function kategori()
    {
        $queryName ="SELECT *  
                     FROM kategori
                    ";
        return $this->db->query($queryName)->result_array();
    }
    public function tampil_produk()
    {
        return $this->db->get('produk');
    }

    public function tambah_produk($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function edit_produk($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function update_produk($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function hapusproduk($produkid)
    {
        $this->db->where('id_produk', $produkid);
        $this->db->delete('produk');
    } 

    public function find($id)
    {
        $result = $this->db->where('id_produk', $id)
            ->limit(1)
            ->get('produk');
        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return array();
        }
    }

    public function detail_brg($id_produk)
    {
        $result = $this->db->where('id_produk', $id_produk)->get('produk');
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return false;
        }
    }

}
