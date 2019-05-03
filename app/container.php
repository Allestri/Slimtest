<?php


$container = $app->getContainer();

// Register component on container
$container['view'] = function ($container) {
    $dir = dirname(__DIR__);
    // var_dump($dir);
    $view = new \Slim\Views\Twig($dir . '/app/views', [
        'cache' => false //dir . '/tmp/cache'
    ]);
    
    // Instantiate and add Slim specific extension
    $router = $container->get('router');
    $uri = \Slim\Http\Uri::createFromEnvironment(new \Slim\Http\Environment($_SERVER));
    $view->addExtension(new \Slim\Views\TwigExtension($router, $uri));
    
    return $view;
};

$container['mailer'] = function ($container) {
    
    $transport = (new Swift_SmtpTransport('localhost', 1025));
    $mailer = new Swift_Mailer($transport);
    return $mailer;
};