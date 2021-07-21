<div class="container-fluid">
    <h4>Detail Pesanan <div class="btn btn-sm btn-success">No. Invoice : <?php echo $invoice['id_invoice'] ?></div>
    </h4>

    <table class="table table-bordered table-hover table-striped">

        <tr>
            <th align="center">ID Barang</th>
            <th >Nama Produk</th>
            <th >Jumlah Pesanan</th>
            <th >Harga Satuan</th>
            <th >Sub Total</th>
        </tr>

        <?php
        $total = 0;
        foreach ($pesanan as $psn) :
            $subtotal = $psn->jumlah * $psn->harga_produk;
            $total += $subtotal;
        ?>
            <tr>
                <td align="center"><?php echo $psn->id_produk ?></td>
                <td align="center"><?php echo $psn->nama_produk ?></td>
                <td align="center"><?php echo $psn->jumlah ?></td>
                <td align="center"><?php echo number_format($psn->harga_produk, 0, ',', '.') ?></td>
                <td align="center"><?php echo number_format($subtotal, 0, ',', '.') ?></td>
            </tr>

        <?php endforeach; ?>

        <tr-->
            <td colspan="4" align="right">Grand Total</td>
            <td align="center">Rp. <?php echo number_format($total, 0, ',', '.') ?></td>
        </tr-->
    </table>
</div>

<div class="container-fluid">
<h4>Aksi</h4>
    <div class="row">
        <div class="col-lg-2">

            <?= form_open_multipart('superadmin/detail_invoice'); ?>
            <div class="form-group row">
                <label for="foto" class="col-sm-4 col-form-label">Bukti Bayar</label>
                <div class="col-sm-8">
                    <img src="<?= base_url('asset/img/buktibayar/') . $invoice['foto']; ?>" class="img-thumbnail">  
                </div>
            </div>
        </div>
    </div>
</div>