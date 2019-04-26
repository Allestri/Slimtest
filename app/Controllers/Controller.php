<?php

namespace App\Controllers;

use Psr\Http\Message\ResponseInterface;

class Controller {
    
    private $container;
    
    public function __construct($container)
    {
        $this->container = $container;
    }
    
    public function redirect($response, $name){
        
        return $response->withStatus(302)->withHeader('Location', $this->router->pathFor($name));
    }
    
    
    public function render(ResponseInterface $response, $file, $params = []){
        
        $this->container->view->render($response, $file, $params);
    }
    
    public function __get($name) {
        return $this->container->get($name);
    }
    
}