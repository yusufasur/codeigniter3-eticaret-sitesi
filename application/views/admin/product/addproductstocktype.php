<?php $this->load->view('admin/include/header'); ?>
<?php $this->load->view('admin/include/leftmenu'); ?>

<div class="row">
    <div class="col-md-8">
        <div class="card card-solid">
            <div class="card-body">
                <form action="<?= base_url('admin/urunstoktipiekle/' . $this->uri->segment(3)) ?>" autocomplete="off" method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="subcategories">Ürün 1. Seçeneğini Belirleyiniz</label>
                                <select name="subcategory" id="subcategories" class="form-control" required>
                                    <option>-- Lütfen Bir Ürün Seçeneği Seçiniz --</option>
                                    <?php foreach ($options as $option): ?>
                                        <option value="<?= $option->id ?>"><?= $option->name ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="subcategories2">Ürün 2. Seçeneğini Belirleyiniz <sup>*opsiyonel</sup></label>
                                <select name="subcategory2" id="subcategories2" class="form-control" required>
                                    <option value="0">-- Lütfen Bir Ürün Seçeneği Seçiniz --</option>
                                    <?php foreach ($options as $option): ?>
                                        <option value="<?= $option->id ?>"><?= $option->name ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="step1" value="1" class="btn btn-block btn-flat btn-success">Ekle</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title"> 3. AŞAMA </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="callout callout-info">
                    <h2 align="center"> Ürün Seçenekleri ve Stok </h2>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>

<?php $this->load->view('admin/include/footer'); ?>