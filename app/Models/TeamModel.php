<?php

namespace App\Models;

use CodeIgniter\Model;

class TeamModel extends Model
{
    protected $table            = 'team';
    protected $primaryKey       = 'id_team';
    protected $returnType       = 'object';
    protected $allowedFields    = ['nama', 'jabatan', 'fb', 'ig', 'gambar_team'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'tanggal_input';
    protected $updatedField  = 'tanggal_ubah';
}
