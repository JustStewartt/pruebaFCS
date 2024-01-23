<?php
namespace App\Controllers;
use App\Controllers\BaseController;

class Game extends BaseController {
    public function dragAndDrop()
    {
        return view('drag_and_drop');
    }
}
