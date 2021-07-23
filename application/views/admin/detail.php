<div class="container-fluid">
    <h4>Detail Pesanan <div class="btn btn-sm btn-success">No. Invoice : <?php echo $invoice['id_invoice'] ?></div>
    <div class="btn btn-sm btn-danger">No. Invoice : <?php echo $invoice['status_invoice'] ?></div>
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
        $ongkir = $pesanan2->total_toko * $pesanan2->ongkos_kurir;
        $total += $ongkir;
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
            <td colspan="4" align="right">Ongkos Kirim</td>
            <td align="center">Rp. <?php echo number_format($ongkir, 0, ',', '.') ?></td>
        </tr-->
            <tr></tr>
        <tr-->
            <td colspan="4" align="right">Grand Total</td>
            <td align="center">Rp. <?php echo number_format($total, 0, ',', '.') ?></td>
        </tr-->

    </table>
    <a href="<?php echo base_url('Superadmin/tampil_invoice') ?>">
        <div class="btn btn-sm btn-primary">Kembali</div>
    </a>

</div>

    <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <?= form_open_multipart('Superadmin/update_invoice'); ?>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="id_invoice" name="id_invoice" value="<?= $invoice['id_invoice']; ?>" hidden="">
                    </div>
                        <div class="form-group row">
                            <div class="col-sm-2">Bukti Bayar</div>
                            <div class="col-sm-3">
                                <img src="<?= base_url('asset/img/buktibayar/') . $invoice['foto']; ?>" class="img-thumbnail">
                            </div>
                        </div>
                    <div class="form-group row">
                        <label for="status" class="col-sm-2 col-form-label">Pilih Status</label>
                        <div class="col-sm-5">
                            <select name="status_invoice" id="status_invoice" class="form-control">
                                <option value="<?=$invoice['status_invoice'];?>"><?=$invoice['status_invoice'];?></option>
                                <option value="Menunggu Pengiriman">menunggu pengiriman</option>
                            </select>
                            </div>
                        </div>   
                            <div class="form-group row justify-content-end">
                                <div class="col-sm">
                                    <input type="submit" class="btn btn-primary"></input>
                                </div>
                            </div>                       
                        </div>
                    </div>
        </div>