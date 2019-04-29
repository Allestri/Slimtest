<?php

use Slim\Http\Request;
use Slim\Http\Response;

require '../vendor/autoload.php';

session_start();


class DemoMiddleware {

    public function __invoke(Request $request, Response $response, $next) {
        
        $response = $next($request, $response);
        $response->write('<h1>Au revoir</h1>');
        return $response;
    }

}


$app = new \Slim\App([
    
    'settings' => [
        'displayErrorDetails' => true
     
    ]
    
]);

require('../app/container.php');


$container = $app->getContainer();

// Middlewares
// $app->add(new DemoMiddleware());
// $app->add(new \App\Middlewares\FlashMiddleware($container->view->getEnvironment()));

$app->get('/', \App\Controllers\PagesController::class . ':home')->setName('home');
$app->get('/contact', \App\Controllers\PagesController::class . ':getContact')->setName('contact');
$app->post('/contact', \App\Controllers\PagesController::class . ':postContact');

$app->run();

