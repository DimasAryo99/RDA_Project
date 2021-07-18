<!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        
                        <div class="navbar">
                            <ul class="nav navbar-nav navbar-right">
                                <li>
                                    </li>
                                </ul>

                                <!-- Alert (Topbar) -->
            
                                
                                <div class="topbar-divider d-none d-sm-block"></div>
                                
                                <a href="<?= base_url('tampilan_user/detail_keranjang')?>" id="alertsDropdown" role="button"  
                                   aria-haspopup="true" aria-expanded="false">
                                   <i class="fas fa-shopping-cart"></i>
                                            <!-- Counter - Alerts -->
                                            <span class="badge badge-danger badge-counter"><?=$tampil['total_keranjang']?></span>
                                </a>

                            <ul class="nav navbar-nav navbar-right">
                                <?php if ($this->session->userdata('email')) { ?>

                                    <li class="nav-item dropdown no-arrow">
                                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?=$user['nama'] ?></span>
                                                <img class="img-profile rounded-circle"
                                                    src="<?= base_url('asset/img/profile/').$user['image'];?>">
                                            </a>
                                            <!-- Dropdown - User Information -->
                                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                                aria-labelledby="userDropdown">
                                                <a class="dropdown-item" <?php echo anchor('auth_pengguna/logout','logout') ?>>
                                                </a>
                                            </div>
                                    </li>
                                <?php } 
                                else 
                                { ?>
                                    <li class="nav-item dropdown no-arrow">
                                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"></span>
                                                <img class="img-profile rounded-circle"
                                                    src="">
                                            </a>
                                            <!-- Dropdown - User Information -->
                                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                                aria-labelledby="userDropdown">
                                                <a class="dropdown-item" <?php echo anchor('auth_pengguna/login','login'); ?>></a>
                                            </div>
                                    </li>


                                <?php } ?>

                            </ul>
                        </div>

                    </ul>

                </nav>
                <!-- End of Topbar -->