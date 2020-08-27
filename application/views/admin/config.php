<?php $this->load->view('admin/include/header') ?>
<?php $this->load->view('admin/include/leftmenu') ?>

<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <form action="<?= base_url('admin/ayarlarpost') ?>" method="post" autocomplete="off" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="title">Site Adı</label>
                        <input type="text" name="title" id="title" required class="form-control" value="<?= $config->title ?>">
                    </div>
                    <div class="form-group">
                        <label for="mail">Site Mail Adresi</label>
                        <input type="email" name="mail" id="mail" required class="form-control" value="<?= $config->mail ?>">
                    </div>
                    <div class="form-group">
                        <label for="info">Adres Bilgisi</label>
                        <textarea name="info" id="info" class="form-control" rows="3"><?= $config->info ?></textarea>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="logo">Site Logo </label>
                                <img width="200" src="<?= base_url($config->logo) ?>" alt="">
                            </div>
                            <div class="col-md-6">
                                <label for="icon">Site İcon </label>
                                <img width="200" src="<?= base_url($config->icon) ?>" alt="">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6"><br>
                                <input type="file" name="logo" id="logo" class="form-control">
                            </div>
                            <div class="col-md-6"><br>
                                <input type="file" name="icon" id="icon" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="facebook">Facebook Adresi</label>
                                <input type="text" name="facebook" id="facebook" class="form-control" value="<?= $config->facebook ?>">
                            </div>
                            <div class="col-md-6">
                                <label for="twitter">Twitter Adresi</label>
                                <input type="text" name="twitter" id="twitter" class="form-control" value="<?= $config->twitter ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="instagram">İnstagram Adresi</label>
                                <input type="text" name="instagram" id="instagram" class="form-control" value="<?= $config->instagram ?>">
                            </div>
                            <div class="col-md-6">
                                <label for="youtube">Youtube Adresi</label>
                                <input type="text" name="youtube" id="youtube" class="form-control" value="<?= $config->youtube ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success btn-block">Kaydet</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('admin/include/footer') ?>
