<?php

namespace App\Entities;

use CodeIgniter\Entity;

class Transaksi extends Entity
{
    public function setBukti($file)
    {
        $fileName = $file->getRandomName();
        $path = 'assets/img/uploads/bukti_bayar';
        $file->move($path, $fileName);
        $this->attributes['bukti'] = $fileName;
        return $this;
    }
}
