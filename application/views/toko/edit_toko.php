<div class="conatiner fluid">
    <h3><i class="fas fa-edit"></i> EDIT DATA BARANG</h3>

    <?php foreach ($toko as $t) :  ?>

        <form method="POST" action="<?= base_url('Superadmin/updatetoko/')?>">

                            <div class="form-group">
                                <label>Nama Toko</label>
                                <input type="text" name="nama_toko" id="nama_toko" class="form-control" value="<?= $t->nama_toko ?>">
                            </div>

                            <div class="form-group">
                                <label>Deskripsi Toko</label>
                                <input type="text" name="deskripsi_toko" id="deskripsi_toko" class="form-control" value="<?= $t->deskripsi_toko ?>">
                            </div>

                            <div class="form-group">
                                <label>Alamat Toko</label>
                                <input type="text" name="alamat_toko" id="alamat_toko" class="form-control" value="<?= $t->alamat_toko ?>">
                            </div>

            <button type="submit" class="btn btn-primary btn-sm mt-3">Simpan
            </button>

        </form>

    <?php endforeach; ?>
</div>