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

        // Obtener todas las categorías para pasarlas a la vista
        $data['categorias'] = $categoriaModel->findAll();

        // Obtener objetos aleatorios para mostrar en el juego
        $data['objetos'] = $objetoModel->obtenerObjetosAleatorios(8);

        return view('drag_and_drop', $data);
    }

    // Agregar una función para obtener objetos aleatorios desde la base de datos
    public function obtenerObjetosAleatorios($cantidad)
    {
        $objetoModel = new ObjetoModel();
        $objetos = $objetoModel->obtenerObjetosAleatorios($cantidad);
        return $this->response->setJSON($objetos);
    }
}

