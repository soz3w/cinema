<?php

namespace Cinema\BoBundle\Controller;

use Cinema\BoBundle\Entity\Actors;
use Doctrine\Common\Util\Debug;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

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
    public function getActorsAction(Request $request)
    {

//        $em =$this->getDoctrine()->getManager();
//        $repoActors=$em->getRepository("CinemaBoBundle:Actors");
//        $query=$repoActors->getActors(50);
//        $paginator  = $this->get('knp_paginator');
//        $pagination = $paginator->paginate(
//            $query,
//            $request->query->get('page', 1)/*page number*/,
//            10/*limit per page*/
//        );

        //$pagination=$this->get('actor')->getActors($request);
        $paginator=$this->get('mypaginator');
        $paginator->setRepo('CinemaBoBundle:Actors');
        $paginator->setRepomethod('getActors');
        $pagination=$paginator->getList($request);
        return $this->render('CinemaBoBundle:Actors:actors.html.twig',array('pagination' => $pagination));
    }

}
