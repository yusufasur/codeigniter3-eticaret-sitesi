<?php $this->load->view('admin/include/header'); ?>
<?php $this->load->view('admin/include/leftmenu'); ?>

<div class="row">
    <div class="col-md-8">
        <div class="card card-solid">
            <div class="card-body">
                <form action="<?= base_url('admin/kategoriekle') ?>" method="post">
                    <div class="form-group">
                        <label for="categoryname">Kategory Adı</label>
                        <input type="text" name="category" id="categoryname" class="form-control" required placeholder="Kategori Adını Giriniz.">
                    </div>
                    <div class="form-group">
                        <label for="topcategory">Üst Kategori</label>
                        <select name="topcategory" id="topcategory" class="form-control" required>
                            <option value="1">Erkek</option>
                            <option value="2">Kadın</option>
                            <option value="3">Çocuk</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-block btn-flat btn-success">Ekle</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('admin/include/footer'); ?>