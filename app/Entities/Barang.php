<?php

namespace App\Entities;

use CodeIgniter\Entity;

class Barang extends Entity
{
    public function setGambar($file)
    {
        $fileName = $file->getRandomName();
        $path = 'assets/img/uploads/barang';
        $file->move($path, $fileName);
        $this->attributes['gambar'] = $fileName;
        return $this;
    }
}
