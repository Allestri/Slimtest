<?php

require '../vendor/autoload.php';





//Class DemoMiddleware {
//   
//   
//   public function __invoke(\Slim\Http\Request $request, \Slim\Http\Response $response, $next){
//       $response->write('<h1>Bienvenue</h1>');
//       $respone = $next($request, $response);
//       $response->write('<h1>Au revoir</h1>');
//       return $response;
//   }
//   
//}

$app = new \Slim\App();

// $container = $app->getContainer();
//$container['pdo'] = function () {
//   $pdo = new PDO('mysql:dbname=slimtest;host=localhost', 'root', '');
//   $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//   return $pdo;
//};

//$app->add(new DemoMiddleware());


$app->get('/salut/{name}', function (\Slim\Http\Request $request, \Slim\Http\Response $response, $args) {
  //var_dump($args);
  //$nom = "Alex";
  //
  //// Test request
  //$req = $this->pdo->prepare('SELECT * FROM posts');
  //$req->execute();
  //$posts = $req->fetchAll();
  //var_dump($posts);
  //
    return $response->write('Bonjour tout le monde !');
});

$app->run();