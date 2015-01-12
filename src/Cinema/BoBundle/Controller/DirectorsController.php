<?php

namespace Cinema\BoBundle\Controller;

use Cinema\BoBundle\Entity\Directors;
use Doctrine\Common\Util\Debug;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;

class DirectorsController extends Controller
{
    public function getDirectorAction(Directors $director,$id)
    {
        return $this->render('CinemaBoBundle:Directors:director.html.twig',array("director"=>$director));
    }
    public function getBestDirectorsAction()
    {
        //getting the entity manager
        $em =$this->getDoctrine()->getManager();
        $repoDirectors=$em->getRepository("CinemaBoBundle:Directors");
        $listBestDirectors = $repoDirectors->getBestDirectors(6);
        //var_dump($listBestActors);
        //exit;

        return $this->render('CinemaBoBundle:Directors:directorsWithMovies.html.twig',array("directors"=>$listBestDirectors));
    }
    public function getDirectorsAction()
    {
        //getting the entity manager
        $em =$this->getDoctrine()->getManager();
        $repoDirectors=$em->getRepository("CinemaBoBundle:Directors");
        $listBestDirectors = $repoDirectors->getDirectors(50);
        ;

        return $this->render('CinemaBoBundle:Directors:directors.html.twig',array("directors"=>$listBestDirectors));
    }

}
