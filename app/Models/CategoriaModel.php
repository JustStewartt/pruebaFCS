<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoriaModel extends Model
{
    protected $table = 'categorias';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nombre'];

    public function obtenerTodasCategorias()
    {
        return $this->findAll();
    }
}
