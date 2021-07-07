
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
                        data-target="#newTokoModal">Tambah Toko</a>

                        <table class="table table-hover">
                        <thead>
                            <tr>
                            <th scope="col">Nomor</th>
                            <th scope="col">Pemilik</th>
                            <th scope="col">Toko</th>
                            <th scope="col">Deskripsi Toko</th>
                            <th scope="col">Alamat Toko</th>
                            <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=1; ?>
                            <?php foreach($listoko as $l):  ?>
                            <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $l['name_admin'] ?></td>
                            <td><?= $l['nama_toko']?></td>
                            <td><?= $l['deskripsi_toko'] ?></td>
                            <td><?= $l['alamat_toko'] ?></td>

                            <td>
                            <?php echo anchor('Superadmin/editoko/' . $l['toko_id'], '<div class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></div>') ?>
                            </td>
                            <td>
                            <?php echo anchor('Superadmin/hapustoko/' . $l['toko_id'], '<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>') ?>
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
                        <div class="modal fade" id="newTokoModal" tabindex="-1" aria-labelledby="newTokoModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="newTokoModalLabel">Tambah Toko</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                                </div>

                                <form action="" method="post">  
                                <div class="modal-body">
                                <div class="form-group">
                                <select name="admin_id" id="admin_id" class="form-control">
                                <option value="">Pilih Pemilik</option>
                                
                                <?php foreach ($listoko as $l):  ?>
                                <option value="<?= $l['admin_id']; ?>"><?= $l['name_admin'];?></option>
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

                             <!-- Modal edit toko  -->
                        <div class="modal fade" id="editTokoModal" tabindex="-1" aria-labelledby="editTokoModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editTokoModalLabel">edit Toko</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                                </div>

                                <?php foreach ($toko as $t) :  ?>

                                <form action="<?= base_url('Superadmin/updatetoko')?>" method="post">  
                            <div class="modal-body">
                            <div class="form-group">
                                <label>Nama Toko</label>
                                <input type="text" name="nama_toko" class="form-control" value="<?= $t->nama_toko ?>">
                            </div>

                            <div class="form-group">
                                <label>Deskripsi Toko</label>
                                <input type="text" name="deskripsi_toko" class="form-control" value="<?= $t->deskripsi_toko ?>">
                            </div>

                            <div class="form-group">
                                <label>Alamat Toko</label>
                                <input type="text" name="alamat_toko" class="form-control" value="<?= $t->alamat_toko ?>">
                            </div>
                            
                            </div>

                            <?php endforeach;  ?>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Add</button>
                                    </form>
                                </div>
                                </div>
                            </div>
                            </div>              
