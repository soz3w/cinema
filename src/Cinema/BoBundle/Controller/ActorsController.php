<?php

namespace Cinema\BoBundle\Controller;

use Cinema\BoBundle\Entity\Movies;
use Doctrine\Common\Util\Debug;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;

class ActorsController extends Controller
{
    public function getMovieAction(Movies $movie,$id)
    {
        return $this->render('CinemaBoBundle:Movies:movie.html.twig',array("movie"=>$movie));
    }
    public function getBestActorsAction()
    {
        //getting the entity manager
        $em =$this->getDoctrine()->getManager();
        $repoActors=$em->getRepository("CinemaBoBundle:Actors");
        $listBestActors = $repoActors->getBestActors(6);
        //var_dump($listBestActors);
        //exit;

        return $this->render('CinemaBoBundle:Actors:actors.html.twig',array("actors"=>$listBestActors));
    }

}
