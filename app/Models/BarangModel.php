<?php

namespace App\Models;

use CodeIgniter\Model;

class BarangModel extends Model
{
    protected $table      = 'barang';
    protected $primaryKey = 'id_barang';
    protected $allowedFields = [
        'nama_barang', 'stok_barang', 'harga', 'deskripsi', 'gambar'
    ];
    protected $returnType = 'App\Entities\Barang';
    protected $useTimestamps = false;
}
