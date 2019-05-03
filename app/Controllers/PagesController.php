<?php

namespace App\Controllers;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use App\Models\Content;


class PagesController extends Controller {
    
/*
    public function __construct()
    {
        $this->posts = new Content();
    }
    
    public function displayContent()
    {
        $posts = $this->posts->getContent();
    }
    */
    
    public function home(RequestInterface $request, ResponseInterface $response)
    {
        $contentModel = new Content();
        $name = $contentModel->getName();
        $username = $contentModel->getUsername();
        $this->render($response, 'pages/home.twig', ["name"=>$name, "username"=>$username]);
        
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
            'success' => 'Votre message a bien ete envoye'
        ];
        
        
        // $this->flash('Votre message a bien ete envoye.');
        
        $message = (new \Swift_Message('Un joli Sujet'))
            ->setFrom([$request->getParam('email') => $request->getParam('name')])
            ->setTo('contact@monsite.fr')
            ->setBody("Un email vient vous a ete envoye :
            {$request->getParam('content')}");
        $this->mailer->send($message);
        
        return $this->redirect($response, 'contact');
    }
    

    
    
}
