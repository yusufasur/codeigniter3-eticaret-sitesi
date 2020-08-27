<?php $this->load->view('admin/include/header'); ?>
<?php $this->load->view('admin/include/leftmenu'); ?>

    <div class="row">
        <div class="col-md-8">
            <div class="card card-solid">
                <div class="card-body">
                    <form action="<?= base_url('admin/urunresimekle/' . $this->uri->segment(3)) ?>" class="dropzone" enctype="multipart/form-data" method="post"></form>
                    <br>
                    <div class="form-group">
                        <a href="<?= base_url('admin/urunstoktipiekle/' . $this->uri->segment(3)) ?>" class="btn btn-success btn-block"> Ürün Seçenekleri ve Stok Bilgilerini Ekle</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title"> 2. AŞAMA </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="callout callout-info">
                        <h2 align="center"> Ürün Resimleri </h2>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>

<?php $this->load->view('admin/include/footer'); ?>