<?php

class invoice_model extends CI_Model
{
    public function index()
    {
        date_default_timezone_set('Asia/Jakarta');

        $invoice    = [
            'nama'          => $this->input->post('nama'),
            'alamat'        => $this->input->post('alamat'),
            'nomor_telepon' => $this->input->post('no_telp'),
            'kurir_id'      => $this->input->post('kurir_id'),
            'tgl_pesan'     => date('Y-m-d H:i:s'),
            'batas_bayar'   => date('Y-m-d H:i:s', mktime(date('H'), date('i'), date('s'), date('m'), date('d') + 1, date('Y'))),
        ];
        $this->db->insert('tb_invoice', $invoice);
        $id_invoice = $this->db->insert_id();
        
        
        foreach ($this->db->contents() as $item) {
            $data = [
                'id_invoice'        => $id_invoice,
                'id_produk'            => $item['id'],
                'nama_produk'          => $item['name'],
                'jumlah'            => $item['qty'],
                'harga'             => $item['price'],
            ];
            $this->db->insert('tb_pesanan', $data);
        }
        return TRUE;
    }

    public function update_buktibayar($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    
    public function tampil_invoice_superadmin()
    {
        $query="SELECT *
                FROM tb_invoice
        ";
        return $this->db->query($query)->result_array();
    }
    
    public function tampil_invoice_user()
    {
        $this->db->select('*');
        $this->db->from('tb_invoice');
        $this->db->join('pengguna','tb_invoice.id_pengguna = pengguna.id_pengguna');
        $this->db->where('pengguna.email', $this->session->userdata('email'));
        return $this->db->get();
    }
    
    public function tampil_detail_user($id)
    {
        $query="SELECT *
                FROM tb_invoice, tb_pesanan , produk               
                WHERE tb_invoice.id_invoice = tb_pesanan.id_invoice
                AND tb_pesanan.id_produk= produk.id_produk                
                AND tb_pesanan.id_invoice = $id
        ";
        return $this->db->query($query)->result();
    }

    public function tampil_foto($id)
    {
        $query="SELECT *
                FROM tb_invoice, tb_pesanan , produk                
                WHERE tb_invoice.id_invoice = tb_pesanan.id_invoice
                AND tb_pesanan.id_produk= produk.id_produk                
                AND tb_pesanan.id_invoice = $id
        ";
        return $this->db->query($query)->row_array();
    }

    public function tampil_detail_superadmin($id_invoice)
    {
        $query="SELECT *
                FROM tb_invoice, tb_pesanan , produk                
                WHERE tb_invoice.id_invoice = tb_pesanan.id_invoice
                AND tb_pesanan.id_produk= produk.id_produk                
                AND tb_pesanan.id_invoice = $id_invoice
        ";
        return $this->db->query($query)->result();
    }
    
    public function ambil_id_invoice($id_invoice)
    {
        $result = $this->db->where('id_invoice', $id_invoice)->limit(1)->get('tb_invoice');
        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return false;
        }
    }
    
    public function ambil_id_pesanan($id_invoice)
    {
        $result = $this->db->where('id_invoice', $id_invoice)->get('tb_pesanan');
        if ($result->num_rows() > 0) {
            return $result->row_array();
        } else {
            return false;
        }
    }

    public function tampil_jumlahinvoice()
    {
        $this->db->select('count(tb_invoice.id_invoice) as total_invoice');
        $this->db->from('tb_invoice');
        $this->db->join('pengguna','tb_invoice.id_pengguna = pengguna.id_pengguna');
        $this->db->where('pengguna.email', $this->session->userdata('email'));
        return $this->db->get();
    }

}
