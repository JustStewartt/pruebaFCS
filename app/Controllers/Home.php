<?php

namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use App\Models\ArticleModel;
use App\Controllers\BaseController;

class Home extends BaseController
{
    public function index(): string
    {
        $articleModel = new ArticleModel();
        $article['articles'] = $articleModel->orderBy('fecha', 'DESC')->limit(6)->findAll();
        return view('articles_list', $article);
    }
}
