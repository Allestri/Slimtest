<?php

require '../vendor/autoload.php'; 

$app = new \Slim\App([
    'settings' => [
        'displayErrorDetails' => true
    ]
]);

$app->get('/salut/{alex}', \App\Controllers\PagesController::class . ' :home');

$app->run();