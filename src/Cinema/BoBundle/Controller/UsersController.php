<?php

namespace Cinema\BoBundle\Controller;

use Cinema\BoBundle\Entity\Actors;
use Doctrine\Common\Util\Debug;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Security\Core\SecurityContext;

class UsersController extends Controller
{
    public function signinAction()
    {
        $request = $this->getRequest();
        $session = $request->getSession();
        // get the login error if there is one
        if ($request->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
            $error = $request->attributes->get(SecurityContext::AUTHENTICATION_ERROR);
        } else {
            $error = $session->get(SecurityContext::AUTHENTICATION_ERROR);
            $session->remove(SecurityContext::AUTHENTICATION_ERROR);
        }
        return $this->render('CinemaBoBundle:Users:login.html.twig', array(
            // last username entered by the user
            'last_username' => $session->get(SecurityContext::LAST_USERNAME),
            'error'         => $error,
        ));


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
