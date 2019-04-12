<?php

require '../vendor/autoload.php';

$app = new \Slim\App();
$app->get('/salut/{nom}', function (\Slim\Http\Request $request, \Slim\Http\Response $response, $args) {
    var_dump($args);
    return $response->write('Bonjour tout le monde !');
});

$app->run();