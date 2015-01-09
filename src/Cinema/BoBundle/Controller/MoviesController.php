<?php

namespace Cinema\BoBundle\Controller;

use Cinema\BoBundle\Entity\Movies;
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

    public function getBestMoviesAction()
    {
        //getting the entity manager
        $em =$this->getDoctrine()->getManager();
        $repoMovies=$em->getRepository("CinemaBoBundle:Movies");
        $listMoviesBest = $repoMovies->getMoviesBest();
        return $this->render('CinemaBoBundle:Movies:BestMovies.html.twig',array("bestMovies"=>$listMoviesBest));
    }

    public function listMoviesAction()
    {
        //getting the entity manager
        $em =$this->getDoctrine()->getManager();

        //getting the repository for movies
        /*$repoMovies=$em->getRepository("CinemaBoBundle:Movies");
        $listMovies = $repoMovies->findBy(
            array('visible' => 1,'cover'=>1),
            array('id' => 'desc'),
            6,
            0
        );*/

        $repoMovies=$em->getRepository("CinemaBoBundle:Movies");
        $listMovies = $repoMovies->getMoviesCovered();



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

        return $this->render('CinemaBoBundle:Movies:Movies.html.twig',array("movies"=>$listMovies));
    }
    public function listMoviesByTagAction($tagId)
    {
        //getting the entity manager
        $em =$this->getDoctrine()->getManager();

        //getting the repository for movies
        $repoTag=$em->getRepository("CinemaBoBundle:Tags");

        $tag = $repoTag->find($tagId);

        $listMovies = $tag->getMovies();

        return $this->render('CinemaBoBundle:Movies:Movies.html.twig',array("movies"=>$listMovies));
    }
}
