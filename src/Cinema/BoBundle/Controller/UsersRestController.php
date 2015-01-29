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
use FOS\RestBundle\Controller\Annotations\View;

class UsersRestController extends Controller
{
    public function getUsersAction(){
        //getting the entity manager
        $em =$this->getDoctrine()->getManager();
        $repoUsers=$em->getRepository("CinemaBoBundle:User");

//        $t = $this->get('translator')->trans('Symfony2 is great');
//        die($t);

        $users = $repoUsers->getUsers(10);
        //die(var_dump($users));
        if(!is_array($users)){
          throw $this->createNotFoundException();
       }
        return $users;
    }
    public function getUserAction($username){
        //getting the entity manager
        $em =$this->getDoctrine()->getManager();
        $repoUsers=$em->getRepository("CinemaBoBundle:User");

        $user = $repoUsers->findOneByUsername($username);
        if(!is_object($user)){
            throw $this->createNotFoundException();
        }
        return $user;
    }
    public function deleteUserAction($username){
        //getting the entity manager
        $em =$this->getDoctrine()->getManager();
        $repoUsers=$em->getRepository("CinemaBoBundle:User");

        $user = $repoUsers->findOneByUsername($username);
        if(!is_object($user)){
            throw $this->createNotFoundException();
        }
        $em->remove($user);
        $em->flush();;
    }
    public function putUserVilleAction($username,$ville){
        //getting the entity manager
        $em =$this->getDoctrine()->getManager();
        $repoUsers=$em->getRepository("CinemaBoBundle:User");

        $user = $repoUsers->findOneByUsername($username);
        if(!is_object($user)){
            throw $this->createNotFoundException();
        }
        $user->setVille($ville);
        $em->persist($user);
        $em->flush();;
    }
    public function postUserAction(array $vals){
        //getting the entity manager
        $em =$this->getDoctrine()->getManager();
        $repoUsers=$em->getRepository("CinemaBoBundle:User");

        $user = $repoUsers->findOneByUsername($username);
        if(!is_object($user)){
            throw $this->createNotFoundException();
        }
        $em->remove($user);
        $em->flush();;
    }



}
