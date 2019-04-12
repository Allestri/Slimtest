<?php

require '../vendor/autoload.php';


class DemoMiddleware {
    
    
    public function __invoke(\Slim\Http\Request $request, \Slim\Http\Response $response, $next){
        $response->write('<h1>Bienvenue</h1>');
        return $next($request, $response);
    }
    
}

$app = new \Slim\App();
$app->add(new DemoMiddleware());
$app->get('/salut/{nom}', function (\Slim\Http\Request $request, \Slim\Http\Response $response, $args) {
    var_dump($args);
    $nom = "Marc";
    return $response->write('Bonjour tout le monde ! ' . $nom);
});

$app->run();