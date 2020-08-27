<?php $this->load->view('admin/include/header'); ?>
<?php $this->load->view('admin/include/leftmenu'); ?>

<div class="row">
    <div class="col-md-8">
        <div class="card card-solid">
            <div class="card-body">
                <form action="<?= base_url('admin/urunstokguncelle/' . $this->uri->segment(3)) ?>" autocomplete="off" method="post">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>
                                    <a href="<?= base_url('admin/urunduzenle/'.$stock->product) ?>" class="btn btn-sm btn-default"><i class="fa fa-arrow-left"></i> Ürüne Geri Dön</a>
                                </label>
                            </div>
                            <div class="form-group">
                                <label for="subcategories"><?= Secenekler::find($type->option1)->name ?></label>
                                <select name="suboption" id="subcategories" class="form-control" required>
                                    <?php foreach ($option1 as $option): ?>
                                        <option value="<?= $option->id ?>" <?= $option->id == $stock->suboption ? 'selected' : null ?>><?= $option->name ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <?php if ($option2 != null): ?>
                                <div class="form-group">
                                    <label for="subcategories2"><?= Secenekler::find($type->option2)->name ?></label>
                                    <select name="suboption2" id="subcategories2" class="form-control" required>
                                        <?php foreach ($option2 as $option): ?>
                                            <option value="<?= $option->id ?>" <?= $option->id == $stock->suboption2 ? 'selected' : null ?>><?= $option->name ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            <?php endif; ?>
                            <div class="form-group">
                                <label for="stock"> Stok Sayısı</label>
                                <input type="number" name="stock" id="stock" min="1" value="<?= $stock->stock ?>" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="step1" value="1" class="btn btn-block btn-flat btn-success">Güncelle</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('admin/include/footer'); ?>