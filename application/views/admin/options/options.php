<?php $this->load->view('admin/include/header'); ?>
<?php $this->load->view('admin/include/leftmenu'); ?>

<div class="row">
    <div class="col-md-3">
        <div class="small-box bg-danger">
            <div class="inner">
                <h4>Ürün Seçenekleri Oluştur</h4>
            </div>
            <div class="icon">
                <i class="fa fa-plus"></i>
            </div>
            <a href="<?= base_url('admin/secenekekle') ?>" class="small-box-footer">Ürün Seçenek Oluşturmak İçin Tıkla <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-md-9">
        <div class="card card-solid">
            <div class="card-body">
                <table id="category" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Seçenek Adı</th>
                        <th>Seçenek Sayısı</th>
                        <th>İşlemler</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($options as $option): ?>
                        <tr>
                            <td><?= $option->name ?></td>
                            <td><?= AltSecenekler::count(['option_id' => $option->id]) ?></td>
                            <td>
                                <a href="<?= base_url("admin/altsecenekler/$option->id") ?>" class="btn btn-xs btn-success"><i class="far fa-circle"></i> Alt Seçenekler</a>
                                <a href="<?= base_url("admin/secenekduzenle/$option->id") ?>" class="btn btn-xs btn-default"><i class="fa fa-edit"></i> Düzenle</a>
                                <?php deletebutton('options', $option->id) ?>
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