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
                ORDER BY tb_invoice.id_invoice DESC
        ";
        return $this->db->query($query)->result_array();
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

    public function tampil_detail_superadmin2($id_invoice)
    {
        $this->db->select('count(toko.toko_id) as total_toko, kurir.ongkos_kurir');
        $this->db->from('tb_invoice');
        $this->db->join('tb_pesanan','tb_invoice.id_invoice = tb_pesanan.id_invoice');
        $this->db->join('produk','tb_pesanan.id_produk= produk.id_produk');
        $this->db->join('toko','produk.toko_id = toko.toko_id');
        $this->db->join('kurir','tb_invoice.kurir_id = kurir.kurir_id');
        $this->db->where('tb_pesanan.id_invoice', $id_invoice);
        return $this->db->get()->row();
    }
    
    public function tampil_detail_admintoko2($id_invoice)
    {
        $this->db->select('count(toko.toko_id) as total_toko, kurir.ongkos_kurir');
        $this->db->from('tb_invoice');
        $this->db->join('tb_pesanan','tb_invoice.id_invoice = tb_pesanan.id_invoice');
        $this->db->join('produk','tb_pesanan.id_produk= produk.id_produk');
        $this->db->join('toko','produk.toko_id = toko.toko_id');
        $this->db->join('admin_toko','admin_toko.toko_id = toko.toko_id');
        $this->db->join('kurir','tb_invoice.kurir_id = kurir.kurir_id');
        $this->db->where('tb_pesanan.id_invoice', $id_invoice);
        $this->db->where('admin_toko.email_admin',$this->session->userdata('email_admin'));
        return $this->db->get()->row();
    }
    
    public function tampil_detail_user2($id_invoice)
    {
        $this->db->select('count(toko.toko_id) as total_toko, kurir.ongkos_kurir');
        $this->db->from('tb_invoice');
        $this->db->join('tb_pesanan','tb_invoice.id_invoice = tb_pesanan.id_invoice');
        $this->db->join('produk','tb_pesanan.id_produk= produk.id_produk');
        $this->db->join('toko','produk.toko_id = toko.toko_id');
        $this->db->join('admin_toko','admin_toko.toko_id = toko.toko_id');
        $this->db->join('kurir','tb_invoice.kurir_id = kurir.kurir_id');
        $this->db->where('tb_pesanan.id_invoice', $id_invoice);
        return $this->db->get()->row();
    }

    public function tampil_invoice_user()
    {
        $this->db->select('*');
        $this->db->from('tb_invoice');
        $this->db->join('pengguna','tb_invoice.id_pengguna = pengguna.id_pengguna');
        $this->db->where('pengguna.email', $this->session->userdata('email'));
        $this->db->order_by('tb_invoice.id_invoice', 'DESC');
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

    public function tampil_invoice_toko()
    {
        $tes= $this->session->userdata('email_admin');
        $query = "SELECT *
        FROM tb_pesanan, produk, tb_invoice ,toko, admin_toko
        WHERE tb_pesanan.id_produk = produk.id_produk
        AND tb_pesanan.id_invoice = tb_invoice.id_invoice 
        AND produk.toko_id = toko.toko_id 
        AND toko.toko_id = admin_toko.toko_id 
        AND admin_toko.email_admin = '$tes'
        ORDER BY tb_invoice.id_invoice DESC
        ";
        return $this->db->query($query);
    }

    public function detail_invoice_toko($id_invoice)
    {
        $tes= $this->session->userdata('email_admin');
        $query = "SELECT *
        FROM tb_pesanan, produk, tb_invoice ,toko, admin_toko
        WHERE tb_pesanan.id_produk = produk.id_produk
        AND tb_pesanan.id_invoice = tb_invoice.id_invoice 
        AND produk.toko_id = toko.toko_id 
        AND toko.toko_id = admin_toko.toko_id
        AND tb_pesanan.id_invoice = '$id_invoice' 
        AND admin_toko.email_admin = '$tes'
        ";
        return $this->db->query($query);
    }

    public function detail_invoice_toko2($id_invoice)
    {
        $tes= $this->session->userdata('email_admin');
        $query = "SELECT *
        FROM tb_pesanan, produk, tb_invoice ,toko, admin_toko
        WHERE tb_pesanan.id_produk = produk.id_produk
        AND tb_pesanan.id_invoice = tb_invoice.id_invoice 
        AND produk.toko_id = toko.toko_id 
        AND toko.toko_id = admin_toko.toko_id
        AND tb_pesanan.id_invoice = '$id_invoice' 
        AND admin_toko.email_admin = '$tes'
        ";
        return $this->db->query($query);
    }

    public function tampil_konfirmasi()
    {
        $query="SELECT COUNT(tb_invoice.id_invoice) AS total_invoice
        FROM tb_invoice
        WHERE tb_invoice.status_invoice = 'menunggu konfirmasi'
        ";
        return $this->db->query($query)->row_array();
    }

    public function tampil_kirim()
    {
        $query="SELECT COUNT(tb_invoice.id_invoice) AS total_invoice
        FROM tb_invoice
        WHERE tb_invoice.status_invoice = 'menunggu pengiriman'
        ";
        return $this->db->query($query)->row_array();
    }

    public function tampil_selesai()
    {
        $query="SELECT COUNT(tb_invoice.id_invoice) AS total_invoice
        FROM tb_invoice
        WHERE tb_invoice.status_invoice = 'selesai'
        ";
        return $this->db->query($query)->row_array();
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
        $this->db->where('tb_invoice.status_invoice','!= selesai');
        return $this->db->get();
    }

}
