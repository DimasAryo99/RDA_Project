                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $tittle; ?></h1>
                                        
                    <?= $this->session->flashdata('message'); ?> 
                    
                    <div class="row">
                        <div class="col-lg-6">
                            <?= form_error('kategori','<div class="alert alert-danger" role="alert">','</div>')?>

                        <a href="" class="btn btn-primary mb-2" data-toggle="modal" 
                        data-target="#newKategoriModal">Tambah Kategori</a>

                        <table class="table table-hover">
                        <thead>
                            <tr>
                            <th scope="col">Nomor</th>
                            <th scope="col">Kategori</th>
                            <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=1; ?>
                            <?php foreach($liskategori as $lk):  ?>
                            <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $lk['nama_kategori']?></td>
                            <td>
                            <?php echo anchor('Superadmin/editkategori/' . $lk['kategori_id'], '<div class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></div>') ?>
                            </td>
                            <td>
                            <?php echo anchor('Superadmin/hapuskategori/' . $lk['kategori_id'], '<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>') ?>
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

                            <!-- Modal Tambah Kategori -->
                            <div class="modal fade" id="newKategoriModal" tabindex="-1" aria-labelledby="newKategoriModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="newKategoriModalLabel">Tambah Kategori</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="<?= base_url('Superadmin/listkategori')  ?>" method="post">  
                                <div class="modal-body">
                                <div class="form-group">
                                <input type="text" class="form-control" id="kategori" name="kategori" placeholder="Tambah Kategori">
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
