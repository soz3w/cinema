<?php

namespace Cinema\FoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('CinemaBoBundle:Default:index.html.twig');
    }

    public function contactAction(Request $request)
    {
        /*if ($request->getMethod()=="POST")
        {

        }*/
        $form = $this->createForm('contact',null,array(
                "action"=>$this->generateUrl("cinema_bo_contact"),
                "method"=>"POST",
                "attr"=>array("novalidate"=>"novalidate")

            )
        );
        $form->handleRequest($request);

        if ($form->isValid()) {
            // Les données sont un tableau avec les clés "name", "email", et "message"
            $data = $form->getData();
            var_dump($data);
        }

        return $this->render('CinemaBoBundle:Default:contact.html.twig',array("form"=>$form->CreateView()));
    }
}
