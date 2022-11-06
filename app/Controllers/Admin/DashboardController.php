<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class DashboardController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Halaman Dashboard',
            'produk_teknologi' => $this->ProdukModel->where('kategori_slug', 'teknologi')->countAllResults(),
            'digital_marketing' => $this->ProdukModel->where('kategori_slug', 'digital-marketing')->countAllResults(),
            'produk_ekonomi' => $this->ProdukModel->where('kategori_slug', 'ekonomi')->countAllResults(),
            'data_server' => $this->ProdukModel->where('kategori_slug', 'data-server')->countAllResults(),
            'data_produk' => $this->ProdukModel->limit(3)->find()
        ];
        return view('admin/dashboard/index', $data);
    }
}
