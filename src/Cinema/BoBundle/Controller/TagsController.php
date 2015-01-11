<?php

namespace Cinema\BoBundle\Controller;

use Cinema\BoBundle\Entity\Movies;
use Cinema\BoBundle\Entity\Categories;
use Cinema\BoBundle\Entity\Tags;
use Doctrine\Common\Util\Debug;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;

class TagsController extends Controller
{
    public function getMovieAction(Categories $tag,$id)
    {
        return $this->render('CinemaBoBundle:Tags:tag.html.twig',array("tag"=>$tag));
    }


    public function getTagsAction()
    {
        //getting the entity manager
        $em =$this->getDoctrine()->getManager();

        //getting the repository for movies
        $repoTags=$em->getRepository("CinemaBoBundle:Tags");

        $listTags =  $repoTags->getTags(6);

        return $this->render('CinemaBoBundle:Tags:tags.html.twig',array("tags"=>$listTags));
    }


}
