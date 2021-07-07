
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
                        data-target="#newKurirModal">Tambah Kurir</a>

                        <table class="table table-hover">
                        <thead>
                            <tr>
                            <th scope="col">Nomor</th>
                            <th scope="col">Nama Kurir</th>
                            <th scope="col">Layanan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=1; ?>
                            <?php foreach($kurir as $k):  ?>
                            <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $k['nama_kurir'] ?></td>
                            <td><?= $k['nama_layanan']?></td>
                            <td>
                            <?php echo anchor('Superadmin/editkurir/' . $k['kurir_id'], '<div class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></div>') ?>
                            </td>
                            <td>
                            <?php echo anchor('Superadmin/hapuskurir/' . $k['kurir_id'], '<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>') ?>
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

                        <!-- Modal Tambah Kurir  -->
                        <div class="modal fade" id="newKurirModal" tabindex="-1" aria-labelledby="newKurirModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="newKurirModalLabel">Tambah Toko</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="<?= base_url('Superadmin/kurir')  ?>" method="post">  
                                <div class="modal-body">
                                <div class="form-group">
                                <input type="text" class="form-control" id="nama_kurir" name="nama_kurir" placeholder="Nama Kurir">
                                </div>
                                <div class="form-group">
                                <select name="layanan_id" id="layanan_id" class="form-control">
                                <option value="">Pilih Layanan</option>
                                <?php foreach ($layanan as $ln):  ?>
                                <option value="<?= $ln['layanan_id']; ?>"><?= $ln['nama_layanan'];?></option>
                                <?php endforeach;  ?>
                                </select>
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

                             <!-- Modal edit toko  -->
                        <div class="modal fade" id="newTokoModal" tabindex="-1" aria-labelledby="newTokoModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="newTokoModalLabel">Tambah Toko</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="<?= base_url('admin/daftartoko')  ?>" method="post">  
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
