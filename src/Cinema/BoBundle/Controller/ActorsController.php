<?php

namespace Cinema\BoBundle\Controller;

use Cinema\BoBundle\Entity\Actors;
use Doctrine\Common\Util\Debug;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;

class ActorsController extends Controller
{
    public function getActorAction(Actors $actor,$id)
    {
        return $this->render('CinemaBoBundle:Actors:actor.html.twig',array("actor"=>$actor));
    }
    public function getBestActorsAction()
    {
        //getting the entity manager
        $em =$this->getDoctrine()->getManager();
        $repoActors=$em->getRepository("CinemaBoBundle:Actors");
        $listBestActors = $repoActors->getBestActors(6);
        //var_dump($listBestActors);
        //exit;

        return $this->render('CinemaBoBundle:Actors:actorsWithMovies.html.twig',array("actors"=>$listBestActors));
    }
    public function getActorsAction()
    {
        //getting the entity manager
        $em =$this->getDoctrine()->getManager();
        $repoActors=$em->getRepository("CinemaBoBundle:Actors");
        $listBestActors = $repoActors->getActors(50);
        //var_dump($listBestActors);
        //exit;

        return $this->render('CinemaBoBundle:Actors:actors.html.twig',array("actors"=>$listBestActors));
    }

}
