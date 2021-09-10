<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model
{
    protected $table      = 'transaksi';
    protected $primaryKey = 'id_transaksi';
    protected $allowedFields = ['id_barang', 'jumlah', 'total', 'alamat_pengiriman', 'bukti', 'id_pengguna', 'status'];
    protected $returnType = 'App\Entities\Transaksi';
    protected $useTimestamps = false;
}
