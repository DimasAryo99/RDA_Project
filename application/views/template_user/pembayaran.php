<div class="container-fluid">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <h3>Input Alamat Pengiriman dan Pilih Pembayaran</h3>

            <form method="post" action="<?= base_url('tampilan_user/tambah_invoice') ?> ">

                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" name="nama" placeholder="Nama Lengkap Anda" class="form-control">
                </div>

                <div class="form-group">
                    <label>Alamat Lengkap</label>
                    <input type="text" name="alamat" placeholder="Alamat Lengkap Anda" class="form-control">
                </div>

                <div class="form-group">
                    <label>Nomor Telepon</label>
                    <input type="text" name="no_telp" placeholder="Nomor Telepon Anda" class="form-control">
                </div>
                
                <div class="form-group">
                    <label>Jasa Pengiriman</label>
                    <select class="form-control" id="kurir_id" name="kurir_id" >
                    <?php foreach ($kurir as $k):  ?>
                    <option value="<?= $k['kurir_id']; ?>"><?= $k['nama_kurir'];?> <?= $k['layanan_kurir'];?></option>
                    <?php endforeach;  ?> 
                    </select>
                </div>

                <div class="form-group">
                    <label>Pilih BANK</label>
                    <select class="form-control" id="bank" name="bank">
                        <option value=""></option>
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