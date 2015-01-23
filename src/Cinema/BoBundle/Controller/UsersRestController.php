<?php

namespace Cinema\BoBundle\Controller;

use Cinema\BoBundle\Entity\Actors;
use Cinema\BoBundle\Entity\User;
use Cinema\BoBundle\Form\UserType;
use Doctrine\Common\Util\Debug;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Security\Core\SecurityContext;
use Cinema\BoBundle\Form\LoginType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;

class UsersRestController extends Controller
{
    public function getUserAction($username){
        //getting the entity manager
        $em =$this->getDoctrine()->getManager();
        $repoUsers=$em->getRepository("CinemaBoBundle:User");
        $user = $this->$repoUsers->findOneByUsername($username);
        if(!is_object($user)){
            throw $this->createNotFoundException();
        }
        return $user;
    }
}
