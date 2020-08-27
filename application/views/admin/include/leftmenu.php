
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="<?= base_url('assets/back/') ?>dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= base_url('assets/back/') ?>dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Alexander Pierce</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="<?= base_url('admin/panel') ?>" class="nav-link  <?php active('panel'); ?>">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Anasayfa
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('admin/urunler') ?>" class="nav-link  <?php active('urunler'); ?>">
                        <i class="nav-icon fas fa-shopping-bag"></i>
                        <p>
                            Ürünler
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('admin/kategoriler') ?>" class="nav-link  <?php active('kategoriler'); ?>">
                        <i class="nav-icon fas fa-list"></i>
                        <p>
                            Ürün Kategorileri
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('admin/urunsecenekleri') ?>" class="nav-link  <?php active('urunsecenekleri'); ?>">
                        <i class="nav-icon fas fa-sort"></i>
                        <p>
                            Ürün Seçenekleri
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('admin/ayarlar') ?>" class="nav-link <?php active('ayarlar'); ?>">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>
                            Site Ayarları
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('admin/cikis') ?>" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Oturumu Kapat
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="javascript:void(0)" class="nav-link active">
                        <!--<i class="nav-icon far fa-circle text-danger"></i>-->
                        <p class="text">FONKSİYONLAR</p>
                    </a>
                </li>
                <li class="nav-item">
                    <?php if ($this->session->userdata('deletefunction')): ?>
                        <a href="<?= base_url('admin/deletefunction') ?>" class="nav-link">
                            <i class="nav-icon fas fa-check text-success"></i>
                            <p class="text">Silme Fonksiyonunu Açık</p>
                        </a>
                    <?php else: ?>
                        <a href="<?= base_url('admin/deletefunction') ?>" class="nav-link">
                            <i class="nav-icon fas fa-exclamation text-danger"></i>
                            <p class="text">Silme Fonksiyonunu Kapalı</p>
                        </a>
                    <?php endif; ?>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>


<!-- ANA KISIM BAŞLANGIÇ -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 mb-2 text-dark"><?= $head ?? null ?></h1>
                    <?php flashread(); ?>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard v2</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">