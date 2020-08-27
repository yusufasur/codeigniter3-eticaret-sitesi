<?php $this->load->view('admin/include/header'); ?>
<?php $this->load->view('admin/include/leftmenu'); ?>

<div class="row">
    <div class="col-md-6">
        <div class="card card-solid">
            <div class="card-body">
                <form action="<?= base_url('admin/urunduzenle/'.$product->id) ?>" autocomplete="off" method="post">
                    <div class="form-group">
                        <label for="title">Ürün Adı</label>
                        <input type="text" name="title" id="title" class="form-control" required placeholder="Ürün Adını Giriniz..." value="<?= $product->title ?>">
                    </div>
                    <div class="form-group">
                        <label for="productcategory">Kategori</label>
                        <select name="category" id="productcategory" class="form-control" required>
                            <option>-- Lütfen Bir Kategori Seçiniz --</option>
                            <option value="1" <?= $product->category == 1 ? 'selected' : null ?>>Erkek</option>
                            <option value="2" <?= $product->category == 2 ? 'selected' : null ?>>Kadın</option>
                            <option value="3" <?= $product->category == 3 ? 'selected' : null ?>>Çocuk</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="subcategories">Alt Kategori</label>
                        <select name="subcategory" id="subcategories" class="form-control" required>
                            <option>-- Lütfen Bir Alt Kategori Seçiniz --</option>
                            <?php foreach ($subcategories as $subcategory): ?>
                                <option value="<?= $subcategory->id ?>" <?= $product->subcategory == $subcategory->id ? 'selected' : null ?>><?= $subcategory->name ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="price">Ürün Fiyatı</label>
                                <input type="number" name="price" id="price" class="form-control" placeholder="0.00" min="0.00" max="10000.00" step="0.01" required value="<?= $product->price ?>">
                            </div>
                            <div class="col-md-6">
                                <label for="discount">İndirimli Fiyatı <span class="text-muted">(isteğe bağlı)</span></label>
                                <input type="number" name="discount" id="discount" class="form-control" placeholder="0.00" max="10000.00" step="0.01" value="<?= $product->discount ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tag">Ürün Tag</label>
                        <input type="text" name="tag" id="tag" class="form-control" value="<?= $product->tag ?>">
                    </div>
                    <div class="form-group">
                        <label for="desc">Ürün Açıklama</label>
                        <textarea name="desc" id="desc" class="form-control" rows="3" required><?= $product->desc ?></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="product" value="1" class="btn btn-block btn-flat btn-success">Güncelle</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title"> Ürün Resimleri </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="row">
                    <?php foreach ($images as $image): ?>
                        <div class="col-md-4">
                            <img src="<?= base_url($image->path) ?>" class="img-thumbnail">
                            <a href="<?= base_url('admin/urunresimsil/' . $image->id) ?>" class="btn btn-xs btn-danger"><i class="fa fa-remove"></i> Fotoğrafı Sil</a>
                            <?php if($image->master == 0): ?>
                                <a href="<?= base_url('admin/urunresimkapak/' . $image->id) ?>" class="btn btn-xs btn-success"><i class="fa fa-camera"></i> Kapak Resmi Yap</a>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
                <hr>
                <form action="<?= base_url('admin/urunresimekle/'.$product->id) ?>" method="post" class="dropzone" enctype="multipart/form-data"></form>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"> Ürün Stok Bilgileri </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th><?= Secenekler::find($type->option1)->name ?></th>
                                <?php if (Secenekler::find($type->option2)): ?>
                                    <th><?= Secenekler::find($type->option2)->name ?></th>
                                <?php endif; ?>
                                <th>Stok Sayısı</th>
                                <th>İşlemler</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($stocks as $stock): ?>
                                <tr>
                                    <td><?= AltSecenekler::find($stock->suboption)->name ?></td>
                                    <?php if (Secenekler::find($type->option2)): ?>
                                        <td><?= AltSecenekler::find($stock->suboption2)->name ?></td>
                                    <?php endif; ?>
                                    <td><?= $stock->stock ?></td>
                                    <td>
                                        <a href="<?= base_url('admin/urunstokguncelle/' . $stock->id) ?>" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i> Düzenle</a>
                                        <?php deletebutton('stocks', $stock->id); ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>

<?php $this->load->view('admin/include/footer'); ?>