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

class UsersController extends Controller
{
    public function signinAction()
    {
        $form = $this->createForm(new LoginType(),null,array(
                "action"=>$this->generateUrl("cinema_bo_login_check"),
                "method"=>"POST",
                "attr"=>array("novalidate"=>"novalidate")

            )
        );
        $request = $this->getRequest();
        $session = $request->getSession();
        // get the login error if there is one
        if ($request->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
            $error = $request->attributes->get(SecurityContext::AUTHENTICATION_ERROR);
        } else {
            $error = $session->get(SecurityContext::AUTHENTICATION_ERROR);
            $session->remove(SecurityContext::AUTHENTICATION_ERROR);
        }
        $form->handleRequest($request);
        return $this->render('CinemaBoBundle:Users:login.html.twig', array(
            // last username entered by the user
            'last_username' => $session->get(SecurityContext::LAST_USERNAME),
            'error'         => $error,
            'form'=>$form->CreateView()

        ));





    }
    public function deniedAction()
    {

        return $this->render('CinemaBoBundle:Users:denied.html.twig');

    }
    
    
    
    
    
    public function logoutAction()
    {
        $form = $this->createForm(new LoginType(),null,array(
                "action"=>$this->generateUrl("cinema_bo_login_check"),
                "method"=>"POST",
                "attr"=>array("novalidate"=>"novalidate")

            )
        );

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
            'form'=>$form->CreateView()
        ));


    }

    public function newUserAction(Request $request)
    {
        $user = new User();
        $form = $this->createForm(new UserType(),$user,array(
                "action"=>$this->generateUrl("cinema_bo_users_new"),
                "method"=>"POST",
                "attr"=>array("novalidate"=>"novalidate")

            )
        );

        //hydrating $movies, pas besoin de getdata
        $form->handleRequest($request);

        if ($form->isValid()) {

            $factory = $this->get('security.encoder_factory');

            $password=$form['password']->getData();

            $encoder = $factory->getEncoder($user);
            $pass = $encoder->encodePassword($password, $user->getSalt());
            $user->setPassword($pass);

            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();
            return new RedirectResponse($this->generateUrl("cinema_bo_movies"));
        }
        return $this->render('CinemaBoBundle:Users:newUser.html.twig',array("form"=>$form->CreateView()));
    }

}
