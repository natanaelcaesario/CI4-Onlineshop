<?php

namespace App\Entities;

use CodeIgniter\Entity;

class Pengguna extends Entity
{
    public function setPassword(string $pass)
    {
        $this->attributes['password'] = md5($pass);
        return $this;
    }
    public function setFoto($file)
    {
        $fileName = $file->getRandomName();
        $path = 'assets/img/uploads/foto';
        $file->move($path, $fileName);
        $this->attributes['foto'] = $fileName;
        return $this;
    }
}
