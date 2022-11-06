<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class SliderController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Manage Slider',
            'data_slider' => $this->SliderModel->findAll(),
            'validation' => \Config\Services::validation()
        ];

        return view('admin/slider/index.php', $data);
    }

    public function update($id_slider)
    {
        // menyimpan aturan dari setiap inputnya
       $rules = $this->validate([
        'judul_slider' =>  'required',
        'deskripsi' =>'required',
        'gambar_slider' => 'max_size[gambar_slider,5048]|is_image[gambar_slider]|mime_in[gambar_slider,image/png,image/jpg,image/jpeg]|ext_in[gambar_slider,png,jpg,jpeg]'
    ]);

   // jika validasi gagal
       if(!$rules){
          session()->setFlashdata('failed', 'Data slider gagal diubah');
          return redirect()->back()->withInput();
      }

   // slug
      // $slug_slider = url_title($this->request->getVar('nama_slider'), '-', true);

   // ambil file gambar
      $gambar = $this->request->getFile('gambar_slider');

   // check gambar diubah atau tidak
      if($gambar->getError() == 4){
      // jika gambar tidak diubah
          $namaGambar = $this->request->getVar('gambar_lama');
      }else{ 
 // ambil nama gambar
          $namaGambar = $gambar->getRandomName();
   // PINDAH GAMBAR
          $gambar->move('assets-admin/img/', $namaGambar);

          unlink('assets-admin/img/' . $this->request->getVar('gambar_lama'));



      }

   // jika data valid
      $this->SliderModel->update($id_slider, 
          [
             'judul_slider' => esc($this->request->getVar('judul_slider')),
             'deskripsi' => strip_tags($this->request->getVar('deskripsi')),
             'gambar_slider' => $namaGambar
         ]);

      return redirect()->to('/slider')->with('success', 'Data slider Berhasil DiUbah');
  }
}
