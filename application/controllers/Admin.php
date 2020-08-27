<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('adminlogin') and $this->uri->segment(2) and $this->uri->segment(2) != 'login') {
            redirect('admin');
        }
    }

    public function index()
    {
        if ($this->session->userdata('adminlogin')) {
            redirect('admin/panel');
        }
        $this->load->view('admin/login');
    }

    public function panel()
    {
        $data['head'] = 'Panel';
        $this->load->view('admin/panel', $data);
    }

    public function deletefunction()
    {
        if ($this->session->userdata('deletefunction')) {
            $this->session->unset_userdata('deletefunction');
        } else {
            $this->session->set_userdata('deletefunction', true);
        }

        back();
    }

    public function sil($table, $id)
    {
        if (!$this->session->userdata('deletefunction')) {die('Burada işin yok.');}

        switch ($table) {
            case 'product':
                if ($product = Urunler::find($id)) {
                    StokTipi::delete(['product' => $id]);
                    Stoklar::delete(['product' => $id]);
                    foreach (Resimler::select(['product' => $id]) as $image) {
                        unlink($image->path);
                        Resimler::delete($image->id);
                    }
                    unlink($product->qrcode);
                    Urunler::delete($id);
                }
                break;
            case 'stocks':
                if (Stoklar::find($id)) { Stoklar::delete($id);}
                break;
            case 'category':
                if (Kategori::find($id)) { Kategori::delete($id);}
                break;
            case 'options':
                if ($option = Secenekler::find($id)) {
                    AltSecenekler::delete(['option_id' => $option->id]);
                    Secenekler::delete($id);
                }
                break;
            case 'suboptions':
                if ($altsecenek = AltSecenekler::find($id)) {
                    Stoklar::delete(['suboption' => $altsecenek->id]);
                    Stoklar::delete(['suboption2' => $altsecenek->id]);
                    AltSecenekler::delete($id);
                }
                break;
        }

        flash('success', 'check', 'Silme işlemi başarıyla gerçekleşti.');
        back();
    }

    // ÜRÜNLER BAŞLANGIÇ
    public function urunler()
    {
        $data['head'] = 'Ürünler';
        $data['products'] = Urunler::select();
        $this->load->view('admin/product/products', $data);
    }

    public function urunekle()
    {
        $data['head'] = 'Ürün Ekle';
        $data['subcategories'] = Kategori::select();
        $this->load->view('admin/product/addproduct', $data);
    }

    public function urunduzenle($id)
    {
        if (isPost()) {
            if (postvalue('product')) { // Ürün update kısmı
                $data = [
                    'category' => postvalue('category'),
                    'subcategory' => postvalue('subcategory'),
                    'title' => postvalue('title'),
                    'desc' => postvalue('desc'),
                    'price' => postvalue('price'),
                    'discount' => postvalue('discount') == 0.00 ? null : postvalue('discount'),
                    'tag' => postvalue('tag')
                ];
                Urunler::update($id, $data);
                flash('success', 'check', 'Ürün bilgileri güncellendi.');
                back();
            }
        }

        $data['head'] = 'Ürün Düzenle';
        $data['product'] = Urunler::find($id) ?? back();
        $data['images'] = Resimler::select(['product' => $id]);
        $data['stocks'] = Stoklar::select(['product' => $id]);
        $data['type'] = StokTipi::find(['product' => $id]);
        $data['subcategories'] = Kategori::select();
        $this->load->view('admin/product/editproduct', $data);
    }

    public function urunresimsil($id)
    {
        $resim = Resimler::find($id);
        if ($resim->master == 1) {
            flash('warning', 'ban', 'Kapak fotoğrafı silinemez!');
            back();
        }
        unlink($resim->path);
        Resimler::delete($id);
        flash('success', 'check', 'Resim başarıyla silindi.');
        back();
    }

    public function urunresimkapak($id)
    {
        $resim = Resimler::find($id);

        Resimler::update(['product' => $resim->product], ['master' => 0]);
        Resimler::update($id, ['master' => 1]);

        flash('success', 'check', 'Kapak resmi güncellendi.');
        back();
    }

    public function urunresimekle($id)
    {
        if (isPost()) {
            $urun = Urunler::find($id);
            $config['upload_path'] = 'assets/uploads/products';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['file_name'] = $urun->seo . $urun->id;
            $this->upload->initialize($config);
            if ($this->upload->do_upload('file')) {
                $image = $this->upload->data();
                $path = $config['upload_path'] . '/' . $image['file_name'];
                $data = [
                    'product' => $id,
                    'path' => $path
                ];
                Resimler::insert($data);
            }
        }

        $data['head'] = 'Ürün Resim Ekle';
        $this->load->view('admin/product/addproductimage', $data);
    }

    public function urunstoktipiekle($id)
    {
        if (isPost()) {
            if (postvalue('subcategory') == postvalue('subcategory2')) {
                flash('warning', 'remove', 'Ürün seçenekleri birbirinden farklı olmalıdır.');
                back();
            }

            if (StokTipi::count(['product' => $id]) > 0) {
                flash('warning', 'remove', 'Bu ürün için zaten stok tipi belirlenmiş');
                back();
            }

            $data = [
                'product' => $id,
                'option1' => postvalue('subcategory'),
                'option2' => postvalue('subcategory2') != 0 ? postvalue('subcategory2') : null,
            ];

            StokTipi::insert($data);

            flash('success', 'check', 'Stok tipi başarıyla girildi.');
            redirect('admin/urunstokekle/'. $id);
        }

        $data['head'] = 'Ürün Stok Ekle';
        $data['options'] = Secenekler::select();
        $this->load->view('admin/product/addproductstocktype', $data);
    }

    public function urunstokekle($id)
    {
        if (isPost()) {
            if (Stoklar::select(['product' => $id, 'suboption' => postvalue('suboption'), 'suboption2' => postvalue('suboption2')])) {
                flash('warning', 'remove', 'Bu seçenekler için zaten stok bilgisi girildi.');
                back();
            }
            $data = [
                'product' => $id,
                'suboption' => postvalue('suboption'),
                'suboption2' => postvalue('suboption2') ? postvalue('suboption2') : null,
                'stock' => postvalue('stock')
            ];
            Stoklar::insert($data);
            flash('success', 'check', 'Stok başarıyla girildi.');
            back();
        }

        $product = Urunler::find($id);
        if (!$product) {
            flash('danger', 'remove', 'Böyle bir ürün bulunamadı.');
            back();
        }
        $stocktype = StokTipi::find(['product' => $product->id]);

        $secenek1 = AltSecenekler::select(['option_id' => $stocktype->option1]);
        $secenek2 = null;
        if ($stocktype->option2 != null) {
            $secenek2 = AltSecenekler::select(['option_id' => $stocktype->option2]);
        }

        $data['option1'] = $secenek1;
        $data['option2'] = $secenek2;
        $data['type'] = $stocktype;
        $data['stocks'] = Stoklar::select(['product' => $id]);
        $data['head'] = 'Ürün Stoklarını Giriniz';
        $this->load->view('admin/product/addproductstock', $data);
    }

    public function urunstokguncelle($id)
    {
        if (isPost()) {
            $stock = Stoklar::find($id);
            $data = [
                'product' => $stock->product,
                'suboption' => postvalue('suboption'),
                'suboption2' => postvalue('suboption2') ? postvalue('suboption2') : null,
                'stock' => postvalue('stock')
            ];
            Stoklar::update($id, $data);
            flash('success', 'check', 'Stok başarıyla güncellendi.');
            back();
        }

        $stock = Stoklar::find($id);
        if (!$stock) {
            flash('danger', 'remove', 'Böyle bir stok bilgisi bulunamadı.');
            back();
        }
        $stocktype = StokTipi::find(['product' => $stock->product]);

        $secenek1 = AltSecenekler::select(['option_id' => $stocktype->option1]);
        $secenek2 = null;
        if ($stocktype->option2 != null) {
            $secenek2 = AltSecenekler::select(['option_id' => $stocktype->option2]);
        }

        $data['option1'] = $secenek1;
        $data['option2'] = $secenek2;
        $data['type'] = $stocktype;
        $data['stock'] = $stock;
        $data['head'] = 'Ürün Stok Güncelle';
        $this->load->view('admin/product/editproductstock', $data);
    }

    public function uruncontroller($id = null)
    {
        if (isPost()) {
            if (postvalue('step1')) {
                $data = [
                    'category' => postvalue('category'),
                    'subcategory' => postvalue('subcategory'),
                    'title' => postvalue('title'),
                    'desc' => postvalue('desc'),
                    'price' => postvalue('price'),
                    'discount' => postvalue('discount') == 0.00 ? null : postvalue('discount'),
                    'tag' => postvalue('tag')
                ];
                Urunler::insert($data);
                $insert_id = $this->db->insert_id();
                $qrpath = 'assets/uploads/qrcode/urun' . $insert_id . '.png';
                $params['data'] = 'urunid=' . $insert_id;
                $params['level'] = 'H';
                $params['size'] = 5;
                $params['savename'] = FCPATH . $qrpath;
                $this->ciqrcode->generate($params);
                Urunler::update($insert_id, ['qrcode' => $qrpath]);

                redirect('admin/urunresimekle/' . $insert_id);
            }
        }

        $urun = Urunler::find($id);
        if ($urun) {
            Urunler::update($id, ['complete' => 1]);
            flash('success', 'check', 'Ürün başarıyla eklendi.');
            redirect('admin/urunler');
        }
    }
    // ÜRÜNLER SON

    // AYARLAR BAŞLANGIÇ
    public function ayarlar()
    {
        $data['head'] = 'Site Ayarları';
        $data['config'] = Ayarlar::find(1);
        $this->load->view('admin/config', $data);
    }

    public function ayarlarpost()
    {
        $config = Ayarlar::find(1);

        $data = [
            'title' => postvalue('title'),
            'info' => postvalue('info'),
            'mail' => postvalue('mail'),
            'facebook' => postvalue('facebook'),
            'twitter' => postvalue('twitter'),
            'instagram' => postvalue('instagram'),
            'youtube' => postvalue('youtube'),
        ];

        if ($_FILES['logo']['size'] > 0) {
            $data['logo'] = imageupload('logo', 'config', 'png');
            @unlink($config->logo);
        }
        if ($_FILES['icon']['size'] > 0) {
            $data['icon'] = imageupload('icon', 'config', 'png|jpg|ico');
            @unlink($config->icon);
        }

        Ayarlar::update(1, $data);
        flash('success', 'check', 'Ayarlar Başarıyla Güncellendi.');
        back();
    }
    // AYARLAR SON

    // ÜRÜN KATEGORİLERİ
    public function kategoriler()
    {
        $data['head'] = 'Ürün Kategorileri';
        $data['categories'] = Kategori::select();
        $this->load->view('admin/category/categories', $data);
    }

    public function kategoriekle()
    {
        if (isPost()) {
            $data = [
                'topcategory' => postvalue('topcategory'),
                'name' => postvalue('category'),
                'slug' => sef(postvalue('category')),
            ];
            Kategori::insert($data);
            flash('success', 'check', 'Kategori Eklendi!');
            back();
        }
        $data['head'] = 'Kategori Ekle';
        $this->load->view('admin/category/addcategory', $data);

    }

    public function kategoriduzenle($id)
    {
        if ($category = Kategori::find($id)) {
            if (isPost()) {
                $data = [
                    'topcategory' => postvalue('topcategory'),
                    'name' => postvalue('category'),
                    'slug' => sef(postvalue('category')),
                ];
                Kategori::update($id, $data);
                flash('success', 'check', 'Kategori Güncellendi!');
                back();
            }
            $data['category'] = $category;
            $this->load->view('admin/category/editcategory', $data);
        }
    }
    // ÜRÜN KATEGORİLERİ SON

    // ÜRÜN SEÇENEKLERİ
    public function urunsecenekleri()
    {
        $data['head'] = 'Ürün Seçenekleri';
        $data['options'] = Secenekler::select();
        $this->load->view('admin/options/options', $data);
    }

    public function secenekekle()
    {
        if (isPost()) {
            $data = [
                'name' => postvalue('option'),
                'slug' => sef(postvalue('option')),
            ];
            Secenekler::insert($data);
            flash('success', 'check', 'Seçenek Eklendi!');
            back();
        }
        $data['head'] = 'Seçenek Ekle';
        $this->load->view('admin/options/addoption', $data);

    }

    public function secenekduzenle($id)
    {
        if ($option = Secenekler::find($id)) {
            if (isPost()) {
                $data = [
                    'name' => postvalue('option'),
                    'slug' => sef(postvalue('option')),
                ];
                Secenekler::update($id, $data);
                flash('success', 'check', 'Seçenek Güncellendi!');
                back();
            }
            $data['option'] = $option;
            $this->load->view('admin/options/editoption', $data);
        }
    }

    public function altsecenekler($id)
    {
        $option = Secenekler::find($id);
        $data['head'] = $option->name . ' İçin Alt Seçenekler';
        $data['suboptions'] = AltSecenekler::select(['option_id' => $id]);
        $data['option'] = $option;
        $this->load->view('admin/options/suboptions', $data);
    }

    public function altsecenekekle($id)
    {
        if (isPost()) {
            $suboption = postvalue('suboption');

            $ara = '-';
            if (strpos($suboption, $ara)) {
                $value = explode($ara, $suboption);
                foreach ($value as $name) {
                    AltSecenekler::insert(['option_id' => $id, 'name' => $name]);
                }
                flash('success', 'check', 'Alt Seçenekler Eklendi');
                redirect('admin/altsecenekler/' . $id);
            } else {
                AltSecenekler::insert(['option_id' => $id, 'name' => $suboption]);
                flash('success', 'check', 'Alt Seçenek Eklendi');
                redirect('admin/altsecenekler/' . $id);
            }
        }
        $this->load->view('admin/options/addsuboption');
    }

    public function altsecenekduzenle($id)
    {
        if ($option = AltSecenekler::find($id)) {
            if (isPost()) {
                $data = [
                    'name' => postvalue('suboption'),
                ];
                AltSecenekler::update($id, $data);
                flash('success', 'check', 'Alt Seçenek Güncellendi!');
                redirect('admin/altsecenekler/' . $option->option_id);
            }
            $data['suboption'] = $option;
            $this->load->view('admin/options/editsuboption', $data);
        }
    }
    // ÜRÜN SEÇENEKLERİ SON


    public function login()
    {
        $email    = $this->input->post('email');
        $password = $this->input->post('sifre');

        $exist    = Yonetim::find(['mail' => $email, 'password' => $password]);

        if ($exist) {
            $this->session->set_userdata('adminlogin', true);
            $this->session->set_userdata('admininfo', $exist);

            redirect('admin/panel');
        } else {
            $hata = 'Email adresi veya şifre hatalı.';
            $this->session->set_flashdata('error', $hata);
            redirect('admin');
        }
    }


    public function cikis()
    {
        $this->session->sess_destroy();
        redirect('admin');
    }
}
