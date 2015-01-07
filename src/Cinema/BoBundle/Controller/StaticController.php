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
        //getting the entity manager
        $em =$this->getDoctrine()->getManager();

        //getting the repository for movies
        $repoMovies=$em->getRepository("CinemaBoBundle:Movies");

        $listMovies = $repoMovies->findBy(
            array('visible' => 1,'cover'=>1),
            array('id' => 'desc'),
            5,
            0
        );

       /* foreach ($listMovies as $movie) {
            // $advert est une instance de Advert
            echo $movie->getContent();
        }*/
        return $this->render('CinemaBoBundle:Static:apropos.html.twig',array("movies"=>$listMovies));
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
    public function deleteMovieAction(Movies $id)
    {

    }

}
