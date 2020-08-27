<?php $this->load->view('admin/include/header'); ?>
<?php $this->load->view('admin/include/leftmenu'); ?>

<div class="row">
    <div class="col-md-3">
        <div class="small-box bg-danger">
            <div class="inner">
                <h3>Ürün Oluştur</h3>
            </div>
            <div class="icon">
                <i class="fa fa-plus"></i>
            </div>
            <a href="<?= base_url('admin/urunekle') ?>" class="small-box-footer">Ürün Oluşturmak İçin Tıkla <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-md-9">
        <div class="card card-solid">
            <div class="card-body">
                <table id="product" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Ürün Adı</th>
                        <th>Ürün Kategorisi</th>
                        <th>Ürün Alt Kategorisi</th>
                        <th>Ürün Fiyat</th>
                        <th>İşlemler</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($products as $product): ?>
                        <tr>
                            <td><?= $product->title ?></td>
                            <td><?php
                                if ($product->category==1){echo 'Erkek';}
                                elseif ($product->category == 2){echo 'Kadın';}
                                elseif($product->category == 3) {echo 'Çocuk';}
                                else {echo 'Belirsiz';} ?>
                            </td>
                            <td><?= Kategori::find($product->subcategory)->name ?></td>
                            <td><?= $product->discount ? '<del class="text-danger">' . $product->price . '₺</del> ' . $product->discount . '₺' : $product->price . '₺' ?></td>
                            <td>
                                <a href="<?= base_url('admin/urunduzenle/' . $product->id) ?>" class="btn btn-xs btn-default"><i class="fa fa-edit"></i> Güncelle</a>
                                <?php deletebutton('product', $product->id) ?>
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