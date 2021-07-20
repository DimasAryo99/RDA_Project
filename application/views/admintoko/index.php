
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->

                    <h1 class="h3 mb-4 text-gray-800">Profile</h1>

                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col-md-4">
                            <img src="" class="card-img">
                            </div>
                            <div class="col-md-8">
                            <div class="card-body">
                            <?php foreach($profile as $p):  ?>
                                <h5 class="card-title"><?=$p->nama_toko;?></h5>
                                <p class="card-text"><?=$p->deskripsi_toko;?></p>
                            <?php endforeach;  ?>
                            </div>
                            </div>
                        </div>
                        </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

