<?php

require '../vendor/autoload.php';

session_start();

$app = new \Slim\App([
    
    'settings' => [
        'displayErrorDetails' => true
     
    ]
    
]);

require('../app/container.php');

$app->get('/', \App\Controllers\PagesController::class . ':home')->setName('home');
$app->get('/contact', \App\Controllers\PagesController::class . ':getContact')->setName('contact');
$app->post('/contact', \App\Controllers\PagesController::class . ':postContact');

$app->run();

