
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $tittle; ?></h1>
                    
                    <div class="row">
                        <div class="col-lg-8">

                        <?php if(validation_errors()): ?>
                        <div class="alert alert-danger" role="alert">
                        <?= validation_errors();   ?>
                        </div>
                        <?php endif; ?>

                        <a href="" class="btn btn-primary mb-2" data-toggle="modal" 
                        data-target="#newProdukModal">Tambah Produk</a>

                        <table class="table table-hover">
                        <thead>
                            <tr>
                            <th scope="col">Nomor</th>
                            <th scope="col">Nama Produk</th>
                            <th scope="col">Harga Produk</th>
                            <th scope="col">Berat Produk</th>
                            <th scope="col">Stok Produk</th>
                            <th scope="col">Gambar Produk</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=1; ?>
                            <?php foreach($produk as $p):  ?>
                            <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $p->nama_produk; ?></td>
                            <td><?= $p->harga_produk; ?></td>
                            <td><?= $p->berat_produk; ?></td>
                            <td><?= $p->stok_produk; ?></td>
                            <td><?= $p->gambar_produk; ?></td>

                            <td>
                            <?php echo anchor('Admintoko/edit_produk/' . $p->id_produk, '<div class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></div>') ?>
                            </td>
                            <td>
                            <?php echo anchor('Admintoko/hapusproduk/' . $p->id_produk, '<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>') ?>
                            </td>

                            </tr>
                            <?php $i++; ?>
                            <?php endforeach; ?>                
                        </tbody>
                        </table>
                    
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

                        <!-- Modal Tambah Toko  -->
                        <div class="modal fade" id="newProdukModal" tabindex="-1" aria-labelledby="newProdukModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="newProdukModalLabel">Tambah Toko</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="<?= base_url('Admintoko/tambah_produk')  ?>" method="post" enctype="multipart/form-data">  
                                <div class="modal-body">
                                
                                <div class="form-group">
                                <select name="kategori_id" id="kategori_id" class="form-control">
                                <option value="">Pilih Kategori</option>
                                <?php foreach ($kategori as $k):  ?>
                                <option value="<?= $k['kategori_id']; ?>"><?= $k['nama_kategori'];?></option>
                                <?php endforeach;  ?>
                                </select>
                                </div>

                                <div class="form-group">
                                <label>Nama Produk</label>
                                <input type="text" name="nama" class="form-control">
                                </div>

                                <div class="form-group">
                                <label>Keterangan Produk</label>
                                <input type="text" name="ket" class="form-control">
                                </div>

                                <div class="form-group">
                                <label>Harga Produk</label>
                                <input type="text" name="harga" class="form-control">
                                </div>

                                <div class="form-group">
                                <label>Berat Produk</label>
                                <input type="text" name="berat" class="form-control">
                                </div>

                                <div class="form-group">
                                <label>Stok Produk</label>
                                <input type="text" name="stok" class="form-control">
                                </div>

                                <div class="form-group">
                                <label>Gambar Produk</label>
                                <input type="file"  name="gambar_produk" class="form-control">
                                </div>
                                
                                <input type="hidden" name="toko_id" value="<?= $toko['toko_id']?>" class="form-control">
                                
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Add</button>
                                    </form>
                                </div>
                                </div>
                            </div>
                            </div>              

                             <!-- Modal edit toko  -->
                        <div class="modal fade" id="newTokoModal" tabindex="-1" aria-labelledby="newTokoModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="newTokoModalLabel">Tambah Toko</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="<?= base_url('admin/toko')  ?>" method="post">  
                                <div class="modal-body">
                                <div class="form-group">
                                <select name="user_id" id="user_id" class="form-control">
                                <option value="">Pilih Pemilik</option>
                                <?php foreach ($user1 as $u):  ?>
                                <option value="<?= $u['user_id']; ?>"><?= $u['name'];?></option>
                                <?php endforeach;  ?>
                                </select>
                                </div>
                                <div class="form-group">
                                <input type="text" class="form-control" id="nama_toko" name="nama_toko" placeholder="Nama Toko">
                                </div>
                                <div class="form-group">
                                <input type="text" class="form-control" id="deskripsi_toko" name="deskripsi_toko" placeholder="Deskripsi Toko">
                                </div>
                                <div class="form-group">
                                <input type="text" class="form-control" id="alamat_toko" name="alamat_toko" placeholder="Alamat Toko">
                                </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Add</button>
                                    </form>
                                </div>
                                </div>
                            </div>
                            </div>              
