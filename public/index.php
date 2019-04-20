<?php

require '../vendor/autoload.php';

$app = new \Slim\App([
    
    'settings' => [
        'displayErrorDetails' => true
     
    ]
    
]);

require('../app/container.php');

$app->get('/salut/{name}', \App\Controllers\PagesController::class . ':home');

$app->run();

