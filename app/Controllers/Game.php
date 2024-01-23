<?php
namespace App\Controllers;
use App\Controllers\BaseController;

class Game extends BaseController {
    public function dragAndDrop(){
        $data['categorias'] = ['Categoria1', 'Categoria2', 'Categoria3', 'Categoria4'];

        return view('drag_and_drop', $data);
    }
}

