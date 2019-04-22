<?php

require '../vendor/autoload.php';

$app = new \Slim\App([
    
    'settings' => [
        'displayErrorDetails' => true
     
    ]
    
]);

require('../app/container.php');

$app->get('/', \App\Controllers\PagesController::class . ':home');
$app->get('/contact', \App\Controllers\PagesController::class . ':getContact')->setName('contact');

$app->run();

