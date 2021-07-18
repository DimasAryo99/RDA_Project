<body id="page-top" >

    <!-- Page Wrapper -->
    <div id="wrapper">            
        
        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" 
        style="background-color:#0076D2;">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-fw fa-store-alt"></i>
            </div>
            <div class="sidebar-brand-text mx-3">RDA TECH </div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider ">

        <li class="nav-item active">
            <li class="nav-item">
            <a class="nav-link" href="<?= base_url('home_user');  ?>">
                <i class=""></i>
                <span>Home</span></a>

        <!-- Divider -->
        <hr class="sidebar-divider ">

        <!-- Menu -->
        <div class="sidebar-heading">
                <span>Kategori</span>
        </div>

        <?php 
        $querySubMenu1 ="SELECT *
                        FROM kategori
                        WHERE 1
                        ";

        $subMenu1 = $this->db->query($querySubMenu1)->result_array();
        ?>

        <?php foreach ($subMenu1 as $sm1) : ?>
        <!-- SubMenu Kategori -->
        <?php if($tittle == $sm1['nama_kategori']): ?>
        <li class="nav-item active">
            <?php else:  ?>
            <li class="nav-item" >
            <?php endif;  ?>
            <a class="nav-link" href="<?= base_url($sm1['url']);  ?>">
                <i class=""></i>
                <span><?= $sm1['nama_kategori']  ?></span></a>
        <?php endforeach ; ?>

        <!-- Divider -->
        <hr class="sidebar-divider ">

        <!-- Menu -->
        <div class="sidebar-heading">
                <span>Toko</span>
        </div>

        <?php 
        $querySubMenu ="SELECT *
                        FROM toko
                        WHERE 1
                        ";

        $subMenu = $this->db->query($querySubMenu)->result_array();
        ?>

        <?php foreach ($subMenu as $sm) : ?>
        <!-- SubMenu Toko -->
        <?php if($tittle == $sm['nama_toko']): ?>
        <li class="nav-item active">
            <?php else:  ?>
            <li class="nav-item">
            <?php endif;  ?>
            <a class="nav-link" href="<?= base_url($sm['url']);  ?>">
                <i class=""></i>
                <span><?= $sm['nama_toko']  ?></span></a>
        <?php endforeach ; ?>

        <!-- Sidebar Toggler (Sidebar) -->

        </ul>
        <!-- End of Sidebar -->