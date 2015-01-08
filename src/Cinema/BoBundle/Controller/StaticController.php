<?php

namespace Cinema\BoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\JsonResponse;

class StaticController extends Controller
{
    public function mentionslegalesAction()
    {
        return $this->render('CinemaBoBundle:Static:mentionslegales.html.twig');
    }
    public function cguAction()
    {
        return $this->render('CinemaBoBundle:Static:cgu.html.twig');
    }
    public function creditsAction()
    {
        return $this->render('CinemaBoBundle:Static:credits.html.twig');
    }
    public function aproposAction()
    {

        return $this->render('CinemaBoBundle:Static:apropos.html.twig');
    }
    public function testAction()
    {
        $response = new Response("test");
        $response->setContent("<h3>modif content </h3>");
        return $response;
        //$response->setStatusCode(404);
       // $response->headers->set('Content-Type', 'text/html');
        //return new JsonResponse("{'id':123}");
        //return new RedirectResponse("http://google.com");
    }


}
