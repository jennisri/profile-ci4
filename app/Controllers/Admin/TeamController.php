<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class TeamController extends BaseController
{
    public function index()
    {
        $data =[
            'title' => 'Manage Team',
            'data_team' => $this->TeamModel->findAll(),
            'validation' => \Config\Services::validation()
        ];

        return view('admin/team/index', $data);
    }

    public function update($id_team)
    {
             // menyimpan aturan dari setiap inputnya
     $rules = $this->validate([
        'nama' =>  'required',
        'jabatan' =>'required',
        'fb' =>'required',
        'ig' =>'required',
        'gambar_team' => 'max_size[gambar_team,5048]|is_image[gambar_team]|mime_in[gambar_team,image/png,image/jpg,image/jpeg]|ext_in[gambar_team,png,jpg,jpeg]'
    ]);

   // jika validasi gagal
     if(!$rules){
      session()->setFlashdata('failed', 'Data team gagal diubah');
      return redirect()->back()->withInput();
  }

   // slug
      // $slug_team = url_title($this->request->getVar('nama_team'), '-', true);

   // ambil file gambar
  $gambar = $this->request->getFile('gambar_team');

   // check gambar diubah atau tidak
  if($gambar->getError() == 4){
      // jika gambar tidak diubah
      $namaGambar = $this->request->getVar('gambar_lama');
  }else{ 
 // ambil nama gambar
      $namaGambar = $gambar->getRandomName();
   // PINDAH GAMBAR
      $gambar->move('assets-admin/img/', $namaGambar);

      // unlink('assets-admin/img/' . $this->request->getVar('gambar_lama'));



  }

   // jika data valid
  $this->TeamModel->update($id_team, 
      [
       'nama' => esc($this->request->getVar('nama')), 
       'jabatan' => esc($this->request->getVar('jabatan')), 
       'fb' => esc($this->request->getVar('fb')), 
       'ig' => esc($this->request->getVar('ig')), 
       'gambar_team' => $namaGambar
   ]);

  return redirect()->to('/team')->with('success', 'Data team Berhasil DiUbah');
}
}

