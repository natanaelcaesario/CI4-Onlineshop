<?php

namespace App\Models;

use CodeIgniter\Model;

class PenggunaModel extends Model
{
    protected $table      = 'pengguna';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'nama', 'email', 'password', 'alamat', 'nomer_telepon', 'foto'
    ];
    protected $returnType = 'App\Entities\Pengguna';
    protected $useTimestamps = false;
}
