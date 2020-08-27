<?php $this->load->view('admin/include/header'); ?>
<?php $this->load->view('admin/include/leftmenu'); ?>

<div class="row">
    <div class="col-md-8">
        <div class="card card-solid">
            <div class="card-body">
                <form action="<?= base_url('admin/kategoriduzenle/' . $category->id) ?>" method="post">
                    <div class="form-group">
                        <label for="categoryname">Kategory Adı</label>
                        <input type="text" name="category" id="categoryname" class="form-control" required placeholder="Kategori Adını Giriniz." value="<?= $category->name ?>">
                    </div>
                    <div class="form-group">
                        <label for="topcategory">Üst Kategori</label>
                        <select name="topcategory" id="topcategory" class="form-control" required>
                            <option <?= $category->topcategory==1 ? 'selected' : null ?> value="1">Erkek</option>
                            <option <?= $category->topcategory==2 ? 'selected' : null ?> value="2">Kadın</option>
                            <option <?= $category->topcategory==3 ? 'selected' : null ?> value="3">Çocuk</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-block btn-flat btn-success">Güncelle</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('admin/include/footer'); ?>