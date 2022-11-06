<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

// untuk memanggil model 
// use App\Models\KategoriModel;

class ProdukController extends BaseController
{
 public function index()
 {
    $data = [
     'title' => 'Halaman Produk',
     'daftar_produk' => $this->ProdukModel->orderBy('id_produk', 'DESC')->findAll()
  ];
  return view('admin/produk/index', $data);
}


public function form_create()
{
   $data = [
      'title' => 'Tambah Produk',
      'kategori_produk' => $this->KategoriModel->findAll(),
      'validation' => \Config\Services::validation()
   ];

   return view('admin/produk/create', $data);
}

public function form_edit($id_produk)
{
   $data = [
      'title' => 'Edit Produk',
      'data_produk' => $this->ProdukModel->find($id_produk),
      'kategori_produk' => $this->KategoriModel->findAll(),
      'validation' => \Config\Services::validation()
   ];

   return view('admin/produk/update', $data);
}

public function save_produk()
{
   // menyimpan aturan dari setiap inputnya
   $rules = $this->validate([
      'nama_produk' =>  'required',
      'kategori_slug' =>'required',
      'deskripsi' => 'required',
      'gambar_produk' => 'max_size[gambar_produk,2048]|uploaded[gambar_produk]|is_image[gambar_produk]|mime_in[gambar_produk,image/png,image/jpg,image/jpeg]|ext_in[gambar_produk,png,jpg,jpeg]'
   ]);

   // jika validasi gagal
   if(!$rules){
      session()->setFlashdata('failed', 'Data produk gagal ditambahkan');
      return redirect()->back()->withInput();
   }

   // slug
   $slug_produk = url_title($this->request->getVar('nama_produk'), '-', true);

   // ambil file gambar
   $gambar = $this->request->getFile('gambar_produk');
   // ambil nama gambar
   $namaGambar = $gambar->getRandomName();
   // PINDAH GAMBAR
   $gambar->move('assets-admin/img/', $namaGambar);

   // jika data valid
   $this->ProdukModel->insert([
      'slug_produk' => $slug_produk,
      'nama_produk' => esc($this->request->getVar('nama_produk')),
      'kategori_slug' => esc($this->request->getVar('kategori_slug')),
      'deskripsi' => strip_tags($this->request->getVar('deskripsi')),
      'gambar_produk' => $namaGambar
   ]);

   return redirect()->to('/daftarproduk')->with('success', 'Data Produk Berhasil Ditambahkan');
}

public function update_produk($id_produk)
{
   // menyimpan aturan dari setiap inputnya
   $rules = $this->validate([
      'nama_produk' =>  'required',
      'kategori_slug' =>'required',
      'deskripsi' => 'required',
      'gambar_produk' => 'max_size[gambar_produk,2048]|is_image[gambar_produk]|mime_in[gambar_produk,image/png,image/jpg,image/jpeg]|ext_in[gambar_produk,png,jpg,jpeg]'
   ]);

   // jika validasi gagal
   if(!$rules){
      session()->setFlashdata('failed', 'Data produk gagal diubah');
      return redirect()->back()->withInput();
   }

   // slug
   $slug_produk = url_title($this->request->getVar('nama_produk'), '-', true);

   // ambil file gambar
   $gambar = $this->request->getFile('gambar_produk');

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
   $this->ProdukModel->update($id_produk, 
      [
         'slug_produk' => $slug_produk,
         'nama_produk' => esc($this->request->getVar('nama_produk')),
         'kategori_slug' => esc($this->request->getVar('kategori_slug')),
         'deskripsi' => strip_tags($this->request->getVar('deskripsi')),
         'gambar_produk' => $namaGambar
      ]);

   return redirect()->to('/daftarproduk')->with('success', 'Data Produk Berhasil DiUbah');
}

// fungsi hapus produk
public function delete_produk()
{
   if($this->request->isAJAX()){
      $id_produk = $this->request->getVar('id_produk');
      $produk = $this->ProdukModel->find($id_produk);

      unlink('assets-admin/img/' . $produk->gambar_produk);

   // hapus dari database
      $this->ProdukModel->delete($id_produk);

      $result = [
         'success' => 'Data Berhasil Dihapus'
      ];

      echo json_encode($result);
   }else{
      exit('404 Not Found');
   }
}

// fungsi detail produk
public function detail_produk($id_produk)
{
  $data = [
     'title' => 'Detail Produk',
     'daftar_produk' => $this->ProdukModel->find($id_produk)
  ];
  return view('admin/produk/detail', $data);  
}


// kategori
public function kategori()
{
 $data = [
   'title' => 'Kategori Produk',
   'daftar_kategori' => $this->KategoriModel->orderBy('id_kategori', 'DESC')->findAll()
];
return view('admin/produk/kategori', $data);
}

// tambah kategori produk
public function store()
{  
   // ambil slug
   $slug = url_title($this->request->getVar('nama_kategori'), '-', true);

   // simpan data ke database
   $data = [
      'nama_kategori' => esc($this->request->getVar('nama_kategori')),
      'slug_kategori' => $slug

   ];

   $this->KategoriModel->insert($data);

   return redirect()->back()->with('success', 'Data Kategori Produk Berhasil Ditambahkan');
}

// ubah kategori produk
public function update($id_kategori)
{
   // ambil slug
   $slug = url_title($this->request->getVar('nama_kategori'), '-', true);

   // simpan data ke database
   $data = [
      'nama_kategori' => esc($this->request->getVar('nama_kategori')),
      'slug_kategori' => $slug

   ];

   $this->KategoriModel->update($id_kategori, $data);

   return redirect()->back()->with('success', 'Data Kategori Produk Berhasil Diubah');
}

public function destroy($id_kategori)
{
   $this->KategoriModel->where('id_kategori', $id_kategori)->delete();
   return redirect()->back()->with('success', 'Data Kategori Produk Berhasil Dihapus');
}

}
