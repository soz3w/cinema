<?php

namespace Cinema\BoBundle\Controller;


use Cinema\BoBundle\Entity\Categories;
use Doctrine\Common\Util\Debug;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;

class CategoriesController extends Controller
{
    public function getMovieAction(Categories $category,$id)
    {
        return $this->render('CinemaBoBundle:Categories:category.html.twig',array("movie"=>$movie));
    }


    public function getCategoriesAction()
    {
        //getting the entity manager
        $em =$this->getDoctrine()->getManager();

        //getting the repository for movies
        $repoCategories=$em->getRepository("CinemaBoBundle:Categories");

        $listCategories =  $repoCategories->getCategories(50);

        return $this->render('CinemaBoBundle:Categories:categories.html.twig',array("categories"=>$listCategories));
    }
    public function getCategoriesWithMoviesAction()
    {
        //getting the entity manager
        $em =$this->getDoctrine()->getManager();

        //getting the repository for movies
        $repoCategories=$em->getRepository("CinemaBoBundle:Categories");

        $listCategories =  $repoCategories->getCategoriesWithMovies(6);

        return $this->render('CinemaBoBundle:Categories:categoriesWithMovies.html.twig',array("categories"=>$listCategories));
    }
    public function getCategoriesMoviesChartAction()
    {
        //getting the entity manager
        $em =$this->getDoctrine()->getManager();

        //getting the repository for movies
        $repoCategories=$em->getRepository("CinemaBoBundle:Categories");

        $listCategories =  $repoCategories->getCategoriesWithMovies(50);

        return $this->render('CinemaBoBundle:Categories:categoriesMoviesChart.html.twig',array("categories"=>$listCategories));
    }


}
