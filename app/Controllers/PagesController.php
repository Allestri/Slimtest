<?php

namespace App\Controllers;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;




class PagesController extends Controller {
    

    
    public function home(RequestInterface $request, ResponseInterface $response)
    {
        
        $this->render($response, 'pages/home.twig');
        
    }
    
    public function getContact(RequestInterface $request, ResponseInterface $response)
    {
        
        $this->render($response, 'pages/contact.twig');
        
    }
    
    public function postContact(RequestInterface $request, ResponseInterface $response)
    {
        $message = (new \Swift_Message('Un joli Sujet'))
            ->setFrom([$request->getParam('email') => $request->getParam('name')])
            ->setTo('contact@monsite.fr')
            ->setBody("Un email vient vous a ete envoye :
            {$request->getParam('content')}");
        $this->mailer->send($message);
        //var_dump($this->mailer);
        return $this->redirect($response, 'contact');
        die();
    }
    
    
}
