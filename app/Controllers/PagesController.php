<?php

namespace App\Controllers;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;




class PagesController {
    
    private $container;
    
    
    public function __construct($container)
    {
        $this->container = $container;
    }
    
    public function home(RequestInterface $request, ResponseInterface $response)
    {
        
        $response->getBody()->write('Salut les gens');
        
    }
    
    
}
