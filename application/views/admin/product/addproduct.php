<?php $this->load->view('admin/include/header'); ?>
<?php $this->load->view('admin/include/leftmenu'); ?>

<div class="row">
    <div class="col-md-8">
        <div class="card card-solid">
            <div class="card-body">
                <form action="<?= base_url('admin/uruncontroller') ?>" autocomplete="off" method="post">
                    <div class="form-group">
                        <label for="title">Ürün Adı</label>
                        <input type="text" name="title" id="title" class="form-control" required placeholder="Ürün Adını Giriniz...">
                    </div>
                    <div class="form-group">
                        <label for="productcategory">Kategori</label>
                        <select name="category" id="productcategory" class="form-control" required>
                            <option>-- Lütfen Bir Kategori Seçiniz --</option>
                            <option value="1">Erkek</option>
                            <option value="2">Kadın</option>
                            <option value="3">Çocuk</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="subcategories">Alt Kategori</label>
                        <select name="subcategory" id="subcategories" class="form-control" required>
                            <option>-- Lütfen Bir Alt Kategori Seçiniz --</option>
                            <?php foreach ($subcategories as $subcategory): ?>
                                <option value="<?= $subcategory->id ?>"><?= $subcategory->name ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="price">Ürün Fiyatı</label>
                                <input type="number" name="price" id="price" class="form-control" placeholder="0.00" min="0.00" max="10000.00" step="0.01" required>
                            </div>
                            <div class="col-md-6">
                                <label for="discount">İndirimli Fiyatı <span class="text-muted">(isteğe bağlı)</span></label>
                                <input type="number" name="discount" id="discount" class="form-control" placeholder="0.00" max="10000.00" step="0.01">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tag">Ürün Tag</label>
                        <input type="text" name="tag" id="tag" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="desc">Ürün Açıklama</label>
                        <textarea name="desc" id="desc" class="form-control" rows="3" required></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="step1" value="1" class="btn btn-block btn-flat btn-success">Ekle</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--<div class="col-md-4">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title"> 1. AŞAMA </h3>
            </div>
            <div class="card-body">
                <h2 align="center"> Ürün Bilgileri </h2>
            </div>
        </div>
    </div>-->
    <div class="col-md-4">
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title"> 1. AŞAMA </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="callout callout-info">
                    <h2 align="center"> Ürün Bilgileri </h2>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>

<?php $this->load->view('admin/include/footer'); ?>