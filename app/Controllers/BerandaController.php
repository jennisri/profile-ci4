<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class BerandaController extends BaseController
{
    public function index()
    {
        $data = [
            'data_slider' => $this->SliderModel->findAll(),
            'data_team' => $this->TeamModel->findAll()
        ];
        return view('users/beranda/index', $data);
    }
}
