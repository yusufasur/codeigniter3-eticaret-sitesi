<?php $this->load->view('admin/include/header'); ?>
<?php $this->load->view('admin/include/leftmenu'); ?>

<div class="row">
    <div class="col-md-8">
        <div class="card card-solid">
            <div class="card-body">
                <form action="<?= base_url('admin/urunstokekle/' . $this->uri->segment(3)) ?>" autocomplete="off" method="post">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="subcategories"><?= Secenekler::find($type->option1)->name ?></label>
                                <select name="suboption" id="subcategories" class="form-control" required>
                                    <?php foreach ($option1 as $option): ?>
                                        <option value="<?= $option->id ?>"><?= $option->name ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <?php if ($option2 != null): ?>
                                <div class="form-group">
                                    <label for="subcategories2"><?= Secenekler::find($type->option2)->name ?></label>
                                    <select name="suboption2" id="subcategories2" class="form-control" required>
                                        <?php foreach ($option2 as $option): ?>
                                            <option value="<?= $option->id ?>"><?= $option->name ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            <?php endif; ?>
                            <div class="form-group">
                                <label for="stock"> Stok Sayısı</label>
                                <input type="number" name="stock" id="stock" min="1" value="1" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="step1" value="1" class="btn btn-block btn-flat btn-success">Ekle</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="card card-primary">
            <div class="card-body">
                <?php foreach ($stocks as $stock): ?>
                    <li>
                        <?php
                        echo Secenekler::find($type->option1)->name . ' : ' . AltSecenekler::find($stock->suboption)->name . ' - ';
                        if (Secenekler::find($type->option2)) {
                            echo Secenekler::find($type->option2)->name . ' : ' . AltSecenekler::find($stock->suboption2)->name . ' - ';
                        }
                        echo ' Stok Sayısı :' . $stock->stock ?>
                    </li>
                <?php endforeach; ?>
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
        <a href="<?= base_url('admin/uruncontroller/' . $this->uri->segment(3)) ?>" class="btn btn-primary btn-block"><i class="fa fa-check"></i> Ürünü Kaydet</a>
    </div>
</div>

<?php $this->load->view('admin/include/footer'); ?>