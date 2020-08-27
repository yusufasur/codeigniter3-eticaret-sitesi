<?php
defined("BASEPATH") or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function index()
    {
        $this->load->view('front/home');
    }

    public function product($seo)
    {
        $product = Urunler::find(['seo' => $seo]);
        if ($product and $product->active == 1) {
            $data['product'] = $product;
            $data['stocks'] = Stoklar::group('suboption', ['product' => $product->id]);
            $data['images'] = Resimler::select(['product' => $product->id], ['master', 'asc']);
            $data['stocktype'] = StokTipi::find(['product' => $product->id]);
            $this->load->view('front/product/product', $data);
        }
    }

    public function getstock()
    {
        $product = postvalue('product');
        $stockid = postvalue('firststock');
        $type = StokTipi::find(['product' => $product]);
        if ($type->option2 == null) {
            $stocks = Stoklar::select(['product' => $product, 'suboption' => $stockid]);
            echo json_encode($stocks);
        } else {
            $stocks = Stoklar::join(['suboptions', 'suboptions.id', 'stocks.suboption2'], ['product' => $product, 'suboption' => $stockid]);
            echo json_encode($stocks);
        }
    }

    public function getcountstock()
    {
        $product = postvalue('product');
        $optionid = postvalue('firststock');
        $optionid2 = postvalue('secondstock');

        $stocks = Stoklar::find(['product' => $product, 'suboption' => $optionid, 'suboption2' => $optionid2]);

        echo $stocks->stock;
    }

    public function category($category)
    {
        switch ($category) {
            case 'erkek':
                $data['kategoriler'] = Kategori::select(['topcategory' => 1]);
                $data['urunler'] = Urunler::select(['category' => 1, 'active' => 1]);
                $data['pageinfo'] = [
                    'title' => 'Erkek',
                    'subtitle' => 'Yeni Sezonun Trend Erkek Ürünleri',
                    'image' => 'empty'
                ];
                break;
            case 'kadin':
                $data['kategoriler'] = Kategori::select(['topcategory' => 2]);
                $data['urunler'] = Urunler::select(['category' => 2, 'active' => 1]);
                $data['pageinfo'] = [
                    'title' => 'Kadın',
                    'subtitle' => 'Yeni Sezonun Trend Kadın Ürünleri',
                    'image' => 'empty'
                ];
                break;
            case 'cocuk':
                $data['kategoriler'] = Kategori::select(['topcategory' => 3]);
                $data['urunler'] = Urunler::select(['category' => 3, 'active' => 1]);
                $data['pageinfo'] = [
                    'title' => 'Çocuk',
                    'subtitle' => 'Yeni Sezonun Trend Çocuk Ürünleri',
                    'image' => 'empty'
                ];
                break;
            default:
                // Hata kodu
                break;
        }
        $this->load->view('front/category/category', $data);
    }

    public function subcategory($category, $subcategory)
    {
        echo $category . ' - ' . $subcategory;
        die;
    }
}