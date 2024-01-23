<?php

namespace App\Models;

use CodeIgniter\Model;

class ObjetoModel extends Model
{
    protected $table = 'objetos';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nombre', 'categoria_id'];

    public function obtenerObjetosAleatorios($cantidad)
    {
        $this->orderBy('RAND()');
        return $this->findAll($cantidad);
    }
}
