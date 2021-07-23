<div class="container-fluid">
    <h4>Detail Pesanan <div class="btn btn-sm btn-success">No. Invoice : <?php echo $invoice->id_invoice ?> </div> 
    <div class="btn btn-sm btn-danger">Status : <?php echo $invoice->status_invoice ?> </div>
    </h4>

    <table class="table table-bordered table-hover table-striped">

        <tr>
            <th>ID Barang</th>
            <th>Nama Produk</th>
            <th>Jumlah Pesanan</th>
            <th>Harga Satuan</th>
            <th>Sub Total</th>
        </tr>

        <?php
        $total = 0;
        $ongkir = $pesanan2->total_toko * $pesanan2->ongkos_kurir;
        $total += $ongkir;
        foreach ($pesanan as $psn) :
            $subtotal = $psn->jumlah * $psn->harga_produk;
            $total += $subtotal;
        ?>
            <tr>
                <td><?php echo $psn->id_produk ?></td>
                <td><?php echo $psn->nama_produk ?></td>
                <td><?php echo $psn->jumlah ?></td>
                <td><?php echo number_format($psn->harga_produk, 0, ',', '.') ?></td>
                <td><?php echo number_format($subtotal, 0, ',', '.') ?></td>
            </tr>

        <?php endforeach; ?>
        
        <tr-->
            <td colspan="4" align="right">Ongkos Kirim</td>
            <td align="center">Rp. <?php echo number_format($ongkir, 0, ',', '.') ?></td>
        </tr-->
            <tr></tr>

        <tr-->
            <td colspan="4" align="right">Grand Total</td>
            <td align="right">Rp. <?php echo number_format($total, 0, ',', '.') ?></td>
        </tr-->
    </table>

    <a href="<?= base_url('Admintoko/tampil_invoice') ?>">
        <div class="btn btn-sm btn-primary">Kembali</div>
    </a>
</div>