<div class="container-fluid">
    <div class="row">

    <?php if(validation_errors()): ?>
                        <div class="alert alert-danger" role="alert">
                        <?= validation_errors();   ?>
                        </div>
                        <?php endif; ?>

        <div class="col-md-2"></div>
        <div class="col-md-8">
            <h3>Input Alamat Pengiriman dan Pilih Pembayaran</h3>

            <form method="post" action="<?= base_url('tampilan_user/pembayaran') ?> ">

                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" name="nama" id="nama" placeholder="" class="form-control" 
                    value="<?= set_value('nama'); ?>">
                </div>

                <div class="form-group">
                    <label>Alamat Lengkap</label>
                    <input type="text" name="alamat" id="alamat" placeholder="" class="form-control"
                    value="<?= set_value('alamat'); ?>">
                </div>

                <div class="form-group">
                    <label>Nomor Telepon</label>
                    <input type="text" name="no_telp" id="no_telp" placeholder="" class="form-control"
                    value="<?= set_value('no_telp'); ?>">
                </div>
                
                <div class="form-group">
                    <label>Jasa Pengiriman</label>
                    <select class="form-control" id="kurir_id" name="kurir_id"
                    value="<?= set_value('kurir_id'); ?>">
                    <?php foreach ($kurir as $k):  ?>
                    <option value="<?= $k['kurir_id']; ?>"><?= $k['nama_kurir'];?> <?= $k['layanan_kurir'];?></option>
                    <?php endforeach;  ?> 
                    </select>
                </div>

                <div class="form-group">
                    <label>Pilih BANK</label>
                    <select class="form-control" id="bank" name="bank" value="<?= set_value('bank');?>">
                        <option value="BCA-324234324234234">BCA - 324234324234234</option>
                        <option value="BNI-234234324324">BNI - 234234324324</option>
                        <option value="Mandiri-234324324342">Mandiri - 234324324342</option>
                        <option value="BRI-5646501651">BRI - 5646501651</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-sm btn-primary mb-3">Pesan</button>
                
            </form>
            
            
        </div>

        <div class="col-md-2"></div>
    </div>
</div>