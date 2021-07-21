                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray"><?= $tittle; ?></h1>
                                        
                    <?= $this->session->flashdata('message'); ?> 
                    
                    <div class="row">
                        <div class="col-lg-10">
                            <?= form_error('kategori','<div class="alert alert-danger" role="alert">','</div>')?>

                        <table class="table table-hover">
                        <thead>
                            <tr>
                            <th scope="col">Id Invoice</th>
                            <th scope="col">Nama Pemesan</th>
                            <th scope="col">Alamat Pengiriman</th>
                            <th scope="col">Nomor Telepon</th>
                            <th scope="col">Tanggal Pemesanan</th>
                            <th scope="col">Batas Pembayaran</th>
                            <th scope="col">Status</th>
                            <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($invoice as $i):  ?>
                            <tr>
                            <td><?= $i['id_invoice']?></td>
                            <td><?= $i['nama']?></td>
                            <td><?= $i['alamat']?></td>
                            <td><?= $i['nomor_telepon']?></td>
                            <td><?= $i['tgl_pesan']?></td>
                            <td><?= $i['batas_bayar']?></td>
                            <td><?= $i['status_invoice']?></td>
                            <td><?php echo anchor('Superadmin/detail_invoice/' . $i['id_invoice'], '<div class="btn btn-sm btn-primary">Detail') ?></td>
                            </tr>
                            <?php $i++; ?>
                            <?php endforeach; ?>                
                        </tbody-->
                        </table>
                                                                     
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->