<div class="container-fluid">

    <div class="card">
        <h5 class="card-header">Detail Produk</h5>
        <div class="card-body">
            <?php foreach ($detail as $d) : ?>
                <div class="row">
                    <div class="col-md-4">
                        <img src="<?php echo base_url() . '/asset/img/produk/' . $d->gambar_produk ?>" class="card-img-top">
                    </div>
                    <div class="col-md-8">
                        <table class="table">

                            <tr>
                                <td>Nama Toko</td>
                                <td><strong><?php echo $d->nama_toko ?></strong></td>
                            </tr>

                            <tr>
                                <td>Kategori</td>
                                <td><strong><?php echo $d->nama_kategori ?></strong></td>
                            </tr>

                            <tr>
                                <td>Nama Produk</td>
                                <td><strong><?php echo $d->nama_produk ?></strong></td>
                            </tr>

                            <tr>
                                <td>Keterangan</td>
                                <td><strong><?php echo $d->ket_produk ?></strong></td>
                            </tr>


                            <tr>
                                <td>Stok</td>
                                <td><strong><?php echo $d->stok_produk ?></strong></td>
                            </tr>

                            <tr>
                                <td>Harga</td>
                                <td><strong>
                                        <div class="btn btn-sm btn-success">Rp. <?php echo number_format($d->harga_produk, 0, ',', '.')  ?></div>
                                    </strong></td>
                            </tr>

                        </table>
                        <?php echo anchor('Admintoko/produk/', '<div class="btn btn-sm btn-danger">Kembali</div>') ?>
                        <?php echo anchor('Admintoko/edit_produk/' . $d->id_produk, '<div class="btn btn-sm btn-primary">Edit Produk</div>') ?>
                    </div>

                </div>
            <?php endforeach; ?>
        </div>
    </div>

</div>