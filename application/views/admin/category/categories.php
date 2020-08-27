<?php $this->load->view('admin/include/header'); ?>
<?php $this->load->view('admin/include/leftmenu'); ?>

<div class="row">
    <div class="col-md-3">
        <div class="small-box bg-danger">
            <div class="inner">
                <h3>Kategori Oluştur</h3>
            </div>
            <div class="icon">
                <i class="fa fa-plus"></i>
            </div>
            <a href="<?= base_url('admin/kategoriekle') ?>" class="small-box-footer">Kategori Oluşturmak İçin Tıkla <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-md-9">
        <div class="card card-solid">
            <div class="card-body">
                <table id="category" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Kategori Adı</th>
                        <th>Üst Kategori</th>
                        <th>İşlemler</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($categories as $category): ?>
                        <tr>
                            <td><?= $category->name ?></td>
                            <td><?php
                                if ($category->topcategory==1){echo 'Erkek';}
                                elseif ($category->topcategory == 2){echo 'Kadın';}
                                elseif($category->topcategory == 3) {echo 'Çocuk';}
                                else {echo 'Belirsiz';} ?>
                            </td>
                            <td>
                                <a href="<?= base_url('admin/kategoriduzenle/' . $category->id) ?>" class="btn btn-xs btn-default"><i class="fa fa-edit"></i> Düzenle</a>
                                <?php deletebutton('category', $category->id) ?>
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