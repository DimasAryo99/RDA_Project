<?php

class invoice_model extends CI_Model
{
    public function kurir_invoice()
    {
        $this->db->select('*');
        $this->db->from('layanan_kurir');
        $this->db->join('kurir','kurir.layanan_id = layanan_kurir.layanan_id');
        $this->db->join('tb_invoice','tb_invoice.kurir_id = kurir.kurir_id');
        return $this->db->get();
    }
    public function index()
    {
        date_default_timezone_set('Asia/Jakarta');
        $nama       = $this->input->post('nama');
        $alamat     = $this->input->post('alamat');

        $invoice    = array(
            'nama'          => $nama,
            'alamat'        => $alamat,
            'tgl_pesan'     => date('Y-m-d H:i:s'),
            'batas_bayar'   => date('Y-m-d H:i:s', mktime(date('H'), date('i'), date('s'), date('m'), date('d') + 1, date('Y'))),
            
        );
        $this->db->insert('tb_invoice', $invoice);
        $id_invoice = $this->db->insert_id();

        foreach ($this->cart->contents() as $item) {
            $data = array(
                'id_invoice'        => $id_invoice,
                'id_produk'            => $item['id'],
                'nama_produk'          => $item['name'],
                'jumlah'            => $item['qty'],
                'harga'             => $item['price'],
            );
            $this->db->insert('tb_pesanan', $data);
        }
        return TRUE;
    }

    public function tampil_data()
    {
        $result = $this->db->get('tb_invoice');
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return FALSE;
        }
    }

    public function ambil_id_invoice($id_invoice)
    {
        $result = $this->db->where('id', $id_invoice)->limit(1)->get('tb_invoice');
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
            return $result->result();
        } else {
            return false;
        }
    }
}
