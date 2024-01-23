<?php
namespace App\Controllers;
use App\Models\CategoriaModel;
use App\Models\ObjetoModel;
use App\Controllers\BaseController;

class Game extends BaseController
{
    public function dragAndDrop()
    {
        $categoriaModel = new CategoriaModel();
        $objetoModel = new ObjetoModel();

        $data['categorias'] = $categoriaModel->findAll();

        $data['objetos'] = $objetoModel->obtenerObjetosAleatorios(8);

        return view('drag_and_drop', $data);
    }
}
