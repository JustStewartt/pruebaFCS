<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('drag-and-drop', 'Game::dragAndDrop');
// RESTful Routes
$routes->get('article-list', 'Article::index');
$routes->get('article-form', 'Article::create');
$routes->post('submit-form', 'Article::store');
$routes->get('edit-article/(:num)', 'Article::singleArticle/$1');
$routes->post('update', 'Article::update');
$routes->get('delete/(:num)', 'Article::delete/$1');