<?php

use Slim\Http\Request;
use Slim\Http\Response;
use App\Controllers\PagesController;

require '../vendor/autoload.php';

session_start();

$app = new \Slim\App([
    
    'settings' => [
        'displayErrorDetails' => true
     
    ]
    
]);
//$page_controller = new PagesController();

// Charger container
require('../app/container.php');


$container = $app->getContainer();

// Middlewares
// $app->add(new DemoMiddleware());
// $app->add(new \App\Middlewares\FlashMiddleware($container->view->getEnvironment()));

$app->get('/', \App\Controllers\PagesController::class .':home')->setName('home');
$app->get('/contact', \App\Controllers\PagesController::class .':getContact')->setName('contact');
$app->post('/contact', \App\Controllers\PagesController::class . ':postContact');

$app->run();

