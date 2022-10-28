<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class DashboardController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Halaman Dashboard'
        ];
        return view('admin/dashboard/index', $data);
    }
}
