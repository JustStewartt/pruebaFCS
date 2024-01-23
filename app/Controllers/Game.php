<?php
namespace App\Controllers;
use App\Models\CategoriaModel;
use App\Models\ObjetoModel;
use App\Controllers\BaseController;

class Game extends BaseController
{
    public function dragAndDrop()
    {

        return view('drag_and_drop');
    }

    // Agregar una función para obtener objetos aleatorios desde la base de datos
    //public function obtenerObjetosAleatorios($cantidad)
    //{
      //  $objetoModel = new ObjetoModel();
     //   $objetos = $objetoModel->obtenerObjetosAleatorios($cantidad);
      //  return $this->response->setJSON($objetos);
  //  }
}

