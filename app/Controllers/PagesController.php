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
        $flash = isset($_SESSION['flash']) ? $_SESSION['flash'] : [];
        $_SESSION['flash'] = [];
        return $this->render($response, 'pages/contact.twig', ['flash' => $flash]);
        
    }
    
    public function postContact(RequestInterface $request, ResponseInterface $response)
    {
        $_SESSION['flash'] = [
            'success' => 'Votre message a bien été envoyé'
        ];
        /*
        $message = (new \Swift_Message('Un joli Sujet'))
            ->setFrom([$request->getParam('email') => $request->getParam('name')])
            ->setTo('contact@monsite.fr')
            ->setBody("Un email vient vous a ete envoye :
            {$request->getParam('content')}");
        $this->mailer->send($message);
        //var_dump($this->mailer);
         */
        return $this->redirect($response, 'contact');
        die();
    }
    
    
}
