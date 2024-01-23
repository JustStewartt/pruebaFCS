<?php
namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\ArticleModel;
use App\Controllers\BaseController;

class Article extends BaseController
{
    protected $modelName = 'App\Models\ArticleModel';
    protected $format = 'json';

    public function index()
    {
        $articleModel = new ArticleModel();
        $article['articles'] = $articleModel->orderBy('fecha', 'DESC')->limit(6)->findAll();
        return view('article_view', $article);
    }


    public function listaArticulosPortada()
    {
        $articleModel = new ArticleModel();
        $article['articles'] = $articleModel->orderBy('fecha', 'DESC')->limit(6)->findAll();
        return view('articles_list', $article);
    }

    public function detalleArticulo($id)
    {
        $articleModel = new ArticleModel();
        $article ['articles'] = $articleModel->find($id);
        return view('article_detail', $article);
    }

    public function singleArticle($id = null){
        $articleModel = new ArticleModel();
        $article['article_obj'] = $articleModel->where('id', $id)->first();
        return view('edit_article', $article);
    }

    public function create(){
        return view('add_article');
    }

    public function store() {
        $articleModel = new ArticleModel();
        $article = [
            'titulo' => $this->request->getVar('titulo'),
            'pClave'  => $this->request->getVar('pClave'),
            'edadMin' => $this->request->getVar('edadMin'),
            'edadMax'  => $this->request->getVar('edadMax'),
            'imagen' => $this->request->getVar('imagen'),
            'sintesis'  => $this->request->getVar('sintesis'),
            'contenido' => $this->request->getVar('contenido'),
        ];
        $articleModel->insert($article);
        return $this->response->redirect(site_url('/article-list'));
    } 

    public function update(){
        $articleModel = new ArticleModel();
        $id = $this->request->getVar('id');
        $article = [
            'titulo' => $this->request->getVar('titulo'),
            'pClave'  => $this->request->getVar('pClave'),
            'edadMin' => $this->request->getVar('edadMin'),
            'edadMax'  => $this->request->getVar('edadMax'),
            'imagen' => $this->request->getVar('imagen'),
            'sintesis'  => $this->request->getVar('sintesis'),
            'contenido' => $this->request->getVar('contenido'),
        ];
        $articleModel->update($id, $article);
        return $this->response->redirect(site_url('/article-list'));
    }
    public function delete($id = null){
        $articleModel = new ArticleModel();
        $article =  $articleModel->where('id', $id)->delete($id);
        return $this->response->redirect(site_url('/article-list'));
    }

}
