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
        return $this->render('CinemaBoBundle:Movies:movie.html.twig',array("movie"=>$movie));
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

    public function getRandomMovieAction()
    {
        //getting the entity manager
        $em =$this->getDoctrine()->getManager();
        $repoMovies=$em->getRepository("CinemaBoBundle:Movies");
        $listMoviesBest = $repoMovies->getBestMovies(6);
        shuffle($listMoviesBest);
       // array_rand also
        $movie = $listMoviesBest[0];

        return $this->render('CinemaBoBundle:Movies:randomMovie.html.twig',array("movie"=>$movie));
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
        $listMovies = $repoMovies->getMoviesCovered(6);

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
