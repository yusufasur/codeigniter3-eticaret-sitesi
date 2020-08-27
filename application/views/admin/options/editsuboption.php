<?php $this->load->view('admin/include/header'); ?>
<?php $this->load->view('admin/include/leftmenu'); ?>

<div class="row">
    <div class="col-md-8">
        <div class="card card-solid">
            <div class="card-body">
                <form action="<?= base_url('admin/altsecenekduzenle/' . $suboption->id) ?>" autocomplete="off" method="post">
                    <div class="form-group">
                        <label for="categoryname">Alt Seçenek Adı</label>
                        <input type="text" name="suboption" id="categoryname" class="form-control" required placeholder="Alt Seçenek Adını Giriniz." value="<?= $suboption->name ?>">
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