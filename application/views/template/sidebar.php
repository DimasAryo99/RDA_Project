       <!-- Sidebar -->
       <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
    <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-fw fa-store-alt"></i>
    </div>
    <div class="sidebar-brand-text mx-3">Shop Admin </div>
</a>

<!-- Divider -->
<hr class="sidebar-divider ">

<!-- Query Menu -->

<?php
    $role_id  = $this->session->userdata('role_id');
    $queryMenu = "SELECT user_menu.menu_id, menu
                  FROM user_menu , user_access_menu
                  WHERE user_access_menu.menu_id = user_menu.menu_id
                  AND user_access_menu.role_id = $role_id
                  ORDER BY user_access_menu.menu_id ASC             
                 ";
    $menu =  $this->db->query($queryMenu)->result_array();         
?>

<!-- Looping Menu -->
<?php  foreach($menu as $m) : ?>
<div class="sidebar-heading">
    <?= $m['menu'];  ?>
</div>

<!-- Sub Menu -->

<?php 
$querySubMenu ="SELECT *
                FROM user_sub_menu , user_menu
                WHERE user_sub_menu.menu_id = user_menu.menu_id
                AND user_sub_menu.menu_id = $m[menu_id]
                AND user_sub_menu.is_active = 1
                ";

$subMenu = $this->db->query($querySubMenu)->result_array();
?>

<?php foreach ($subMenu as $sm) : ?>
<?php if($tittle == $sm['tittle']): ?>
    <li class="nav-item active">
    <?php else :  ?>
    <li class="nav-item">
    <?php endif ;  ?>
    <a class="nav-link" href="<?= base_url($sm['url']);  ?>">
        <i class="<?= $sm['icon'];  ?>"></i>
        <span><?= $sm['tittle'];  ?></span></a>
</li>

<?php endforeach; ?>

<!-- Divider -->
<hr class="sidebar-divider">

<?php endforeach; ?>

<!-- Nav Item - My Profile -->
<li class="nav-item">
    <a class="nav-link" href="<?= base_url('auth/logout');?>">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Logout</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->