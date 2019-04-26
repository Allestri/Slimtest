<?php

namespace App\Middlewares;

use Slim\Http\Request;
use Slim\Handlers\Strategies\RequestResponse;
use Slim\Http\Response;
use Twig\Environment;

class FlashMiddleware {
    

    
    private $twig;
    
    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }
    
    public function __invoke(Request $request, Response$response, $next)
    {
        $this->twig->addGlobal('flash', isset($_SESSION['flash']) ? $_SESSION['flash'] : []);
        if(isset($_SESSION['flash'])) {
            unset($_SESSION['flash']);
        }
    return $next($request, $response);
    }
    
}