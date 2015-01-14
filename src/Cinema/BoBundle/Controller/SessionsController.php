<?php

namespace Cinema\BoBundle\Controller;

use Cinema\BoBundle\Entity\Comments;
use Doctrine\Common\Util\Debug;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;

class SessionsController extends Controller
{


    public function getSessionsAction()
    {
        //getting the entity manager
        $em =$this->getDoctrine()->getManager();
        $repoSessions=$em->getRepository("CinemaBoBundle:Sessions");
        $sessions = $repoSessions->getSessions(6, new \DateTime("2013-03-15"));

        return $this->render('CinemaBoBundle:Sessions:sessions.html.twig',
            array("sessions"=>$sessions));
    }


}
