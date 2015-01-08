<?php

namespace Cinema\BoBundle\Controller;

use Cinema\BoBundle\Entity\Movies;
use Cinema\BoBundle\Entity\Categories;
use Cinema\BoBundle\Entity\Tags;
use Doctrine\Common\Util\Debug;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;

class MoviesController extends Controller
{
    public function getMovieAction(Movies $movie,$id)
    {
        return $this->render('CinemaBoBundle:Movies:Movie.html.twig',array("movie"=>$movie));
    }
    public function removeMovieAction(Movies $movie,$id)
    {
        //getting the entity manager
        $em =$this->getDoctrine()->getManager();
        $em->remove($movie);
        $em->flush();
        //$url = this->gene
        return new RedirectResponse($this->generateUrl("cinema_bo_movies"));
    }

    public function listMoviesAction()
    {
        //getting the entity manager
        $em =$this->getDoctrine()->getManager();

        //getting the repository for movies
        $repoMovies=$em->getRepository("CinemaBoBundle:Movies");

        $listMovies = $repoMovies->findBy(
            array('visible' => 1,'cover'=>1),
            array('id' => 'desc'),
            6,
            0
        );

        /* foreach ($listMovies as $movie) {
             // $advert est une instance de Advert
             echo $movie->getContent();
         }*/

        return $this->render('CinemaBoBundle:Movies:Movies.html.twig',array("movies"=>$listMovies));
    }

    //paramConverter to see
    public function listMoviesByCategoryAction($catId)
    {
        //getting the entity manager
        $em =$this->getDoctrine()->getManager();

        //getting the repository for movies
        $repoCategory=$em->getRepository("CinemaBoBundle:Categories");

        $category = $repoCategory->find($catId);

        $listMovies = $category->getMovies();
        /* foreach ($listMovies as $movie) {
             // $advert est une instance de Advert
             echo $movie->getContent();
         }*/

        return $this->render('CinemaBoBundle:Movies:Movies.html.twig',array("movies"=>$listMovies));
    }
}
