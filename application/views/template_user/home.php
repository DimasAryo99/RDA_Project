
                <!-- Begin Page Content -->
                <div class="container-fluid">

                <h1 class="h3 mb-4 text-gray-800">Home</h1>

                <div class="row text-center mt-4">

                    <?php foreach ($produk as $p) : ?>

                        <div class="card ml-3 mb-4" style="width: 16rem;">
                            <img src="<?= base_url('/asset/img/produk/').$p->gambar_produk ?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title mb-1"><?php echo $p->nama_produk ?></h5>
                                <small><?php echo $p->ket_produk ?></small><br>
                                <span class="badge badge-pill badge-success mb-3"> <small>Rp. <?php echo number_format($p->harga_produk, 0, ',', '.')  ?></small></span>
                                <div>
                                    <?php echo anchor('tampilan_user/tambah_ke_keranjang/' . $p->id_produk, '<div class="btn btn-sm btn-primary"><i class="fas fa-shopping-cart"></i>Add</div>') ?>
                                    <?php echo anchor('tampilan_user/detail_b/' . $p->id_produk, '<div class="btn btn-sm btn-success">Detail</div>') ?>
                                </div>
                            </div>
                        </div>
                        
                    <?php endforeach; ?>
                    </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

