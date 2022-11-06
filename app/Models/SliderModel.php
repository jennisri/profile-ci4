<?php

namespace App\Models;

use CodeIgniter\Model;

class SliderModel extends Model
{
    protected $table            = 'slider';
    protected $primaryKey       = 'id_slider';
    protected $returnType       = 'object';
    protected $allowedFields    = ['judul_slider', 'deskripsi', 'gambar_slider'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'tanggal_input';
    protected $updatedField  = 'tanggal_ubah';
    // protected $deletedField  = 'deleted_at';

}
