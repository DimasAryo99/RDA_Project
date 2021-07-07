<div class="conatiner fluid">
    <h3><i class="fas fa-edit"></i> EDIT DATA BARANG</h3>

    <?php foreach ($produk as $p) :  ?>

        <form method="post" action="<?= base_url('Admintoko/updateproduk')?>">

                            <div class="form-group">
                                <label>Nama Produk</label>
                                <input type="text" name="nama_produk" id="nama_produk" class="form-control" value="<?= $p->nama_produk ?>">
                            </div>

                            <div class="form-group">
                                <label>Keterangan Produk</label>
                                <input type="text" name="ket_produk" id="ket_produk" class="form-control" value="<?= $p->ket_produk ?>">
                            </div>

                            <div class="form-group">
                                <label>Harga Produk</label>
                                <input type="text" name="harga_produk" id="harga_produk" class="form-control" value="<?= $p->harga_produk ?>">
                            </div>

                            <div class="form-group">
                                <label>Berat Produk</label>
                                <input type="text" name="berat_produk" id="berat_produk" class="form-control" value="<?= $p->berat_produk?>">
                            </div>

                            <div class="form-group">
                                <label>Stok Produk</label>
                                <input type="text" name="stok_produk" id="stok_produk" class="form-control" value="<?= $p->stok_produk?>">
                            </div>

            <button type="submit" class="btn btn-primary btn-sm mt-3">Simpan
            </button>

        </form>

    <?php endforeach; ?>
</div>