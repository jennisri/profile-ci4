<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
// panggil model myth auth
use \Myth\Auth\Models\UserModel;

class AkunController extends BaseController
{
    protected $UserModel;
    protected $db, $builder;

    public function __construct()
    {
        $this->UserModel = new UserModel;
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('users');
    }


    public function index()
    {
        $data = [
            'title' => 'Data Akun',
            // ambil seluruh data dari tabel users dan jadikan type data nya object
            'data_user' => $this->builder->get()->getResultObject()
        ];

        return view('admin/akun/index', $data);
    }

    public function update($id)
    {
        // melakukan update user
        $data = [
            'email' => strip_tags($this->request->getPost('email')),
            'username' => strip_tags($this->request->getPost('username')),
        ];

        $this->builder->where('id', $id);
        $this->builder->update($data);

        return redirect()->back()->with('success', 'Data Berhasil DiUbah')  ;  
    }

    public function delete($id)
    {
        $this->builder->delete(['id' => $id]);
        return redirect()->back()->with('success', 'Data Berhasil Dihapus')  ;  


    }
}
