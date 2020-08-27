<?php $this->load->view('admin/include/header'); ?>
<?php $this->load->view('admin/include/leftmenu'); ?>

<div class="row">
    <div class="col-md-3">
        <div class="small-box bg-danger">
            <div class="inner">
                <h4>Ürün Alt Seçenekleri Oluştur</h4>
            </div>
            <div class="icon">
                <i class="fa fa-plus"></i>
            </div>
            <a href="<?= base_url('admin/altsecenekekle/' . $option->id) ?>" class="small-box-footer"><?= $option->name ?> İçin Alt Seçenek Oluştur <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-md-9">
        <div class="card card-solid">
            <div class="card-body">
                <table id="category" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Alt Seçenek Adı</th>
                        <th>İşlemler</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($suboptions as $suboption): ?>
                        <tr>
                            <td><?= $suboption->name ?></td>
                            <td>
                                <a href="<?= base_url("admin/altsecenekduzenle/$suboption->id") ?>" class="btn btn-xs btn-default"><i class="fa fa-edit"></i> Düzenle</a>
                                <?php deletebutton('suboptions', $suboption->id) ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('admin/include/footer'); ?>