<?php

namespace Cinema\FoBundle\Controller;

use Cinema\BoBundle\Entity\Movies;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Cinema\BoBundle\Form\MoviesType;

class MoviesController extends Controller
{
    public function getMovieAction(Movies $movie,$id)
    {
        return $this->render('CinemaBoBundle:Movies:movie.html.twig',array("movie"=>$movie));
    }


    public function getBestMoviesAction()
    {
        //getting the entity manager
        $em =$this->getDoctrine()->getManager();
        $repoMovies=$em->getRepository("CinemaBoBundle:Movies");
        $listMoviesBest = $repoMovies->getBestMovies(6);
        return $this->render('CinemaBoBundle:Movies:bestMovies.html.twig',array("bestMovies"=>$listMoviesBest));
    }
    public function getBestExpectedMoviesAction()
    {
        //getting the entity manager
        $em =$this->getDoctrine()->getManager();
        $repoMovies=$em->getRepository("CinemaBoBundle:Movies");
        $listMoviesBest = $repoMovies->getBestExpectedMovies(6);
        return $this->render('CinemaBoBundle:Movies:bestExpectedMovies.html.twig',array("bestMovies"=>$listMoviesBest));
    }

    public function listMoviesAction()
    {

        $movie = $this->get('movie');
        $movie->setNb(6);
        $listMovies = $movie->getMoviesCovered();

        return $this->render('CinemaBoBundle:Movies:movies.html.twig',array("movies"=>$listMovies));
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

        return $this->render('CinemaBoBundle:Movies:movies.html.twig',array("movies"=>$listMovies));
    }
    public function listMoviesByTagAction($tagId)
    {
        //getting the entity manager
        $em =$this->getDoctrine()->getManager();

        //getting the repository for movies
        $repoTag=$em->getRepository("CinemaBoBundle:Tags");

        $tag = $repoTag->find($tagId);

        $listMovies = $tag->getMovies();

        return $this->render('CinemaBoBundle:Movies:movies.html.twig',array("movies"=>$listMovies));
    }
}
