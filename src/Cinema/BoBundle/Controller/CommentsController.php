<?php

namespace Cinema\BoBundle\Controller;

use Cinema\BoBundle\Entity\Comments;
use Doctrine\Common\Util\Debug;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;

class CommentsController extends Controller
{


    public function getCommentsAction()
    {
        //getting the entity manager
        $em =$this->getDoctrine()->getManager();
        $repoComments=$em->getRepository("CinemaBoBundle:Comments");
        $commentsActives = $repoComments->getComments(6,2);
        $commentsInActives = $repoComments->getComments(6,0);
        $commentsEncoursVal = $repoComments->getComments(6,1);


        return $this->render('CinemaBoBundle:Comments:comments.html.twig',
            array("commentsActives"=>$commentsActives,
                  "commentsInActives"=>$commentsInActives,
                  "commentsEncoursVal"=>$commentsEncoursVal,
                ));
    }


}
