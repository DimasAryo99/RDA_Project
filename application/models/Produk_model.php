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
    
    public function tampilan_keranjang()
    {
        $this->db->select('keranjang.id_keranjang, produk.nama_produk, keranjang.jumlah, produk.harga_produk, (produk.harga_produk * keranjang.jumlah) AS total_harga');
        $this->db->from('produk');
        $this->db->join('keranjang','produk.id_produk = keranjang.id_produk');
        $this->db->join('pengguna','keranjang.id_pengguna = pengguna.id_pengguna');
        $this->db->where('pengguna.email', $this->session->userdata('email'));
        $this->db->where('pengguna.email', $this->session->userdata('email'));
        return $this->db->get();
    }
    
    public function tampil_jumlahkeranjang()
    {
        $this->db->select('count(keranjang.id_keranjang) as total_keranjang');
        $this->db->from('keranjang');
        $this->db->join('produk','keranjang.id_produk = produk.id_produk');
        $this->db->join('pengguna','keranjang.id_pengguna = pengguna.id_pengguna');
        $this->db->where('pengguna.email', $this->session->userdata('email'));
        return $this->db->get();
    }

    public function tampil_updatekeranjang($id,$user)
    {
        $this->db->select('*');
        $this->db->from('keranjang');
        $this->db->join('produk','keranjang.id_produk = produk.id_produk');
        $this->db->join('pengguna','keranjang.id_pengguna = pengguna.id_pengguna');
        $this->db->where('keranjang.id_pengguna', $user);
        $this->db->where('keranjang.id_produk', $id);
        return $this->db->get();
    }

    public function simpan_pesanan($user)
    {
        $this->db->select('*');
        $this->db->from('keranjang');
        $this->db->where('keranjang.id_pengguna', $user);
        return $this->db->get();
    }

    public function hapus_keranjang($hapus)
    {
        $this->db->where('id_keranjang', $hapus);
        $this->db->delete('keranjang');
    } 
    
    public function destroykeranjang($c)
    {
        $this->db->where('id_keranjang',$c);
        $this->db->delete('keranjang');
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
