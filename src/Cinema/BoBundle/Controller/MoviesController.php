<?php

namespace Cinema\BoBundle\Controller;

use Cinema\BoBundle\Entity\Movies;
use Doctrine\Common\Util\Debug;
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
    public function newMovieAction(Request $request)
    {
        $movies = new Movies();
        $form = $this->createForm(new MoviesType(),$movies,array(
                "action"=>$this->generateUrl("cinema_bo_movies_new"),
                "method"=>"POST",
                "attr"=>array("novalidate"=>"novalidate")

            )
        );

        //hydrating $movies, pas besoin de getdata
        $form->handleRequest($request);

        if ($form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($movies);
            $em->flush();
            return new RedirectResponse($this->generateUrl("cinema_bo_movies"));
        }
        return $this->render('CinemaBoBundle:Movies:newMovie.html.twig',array("form"=>$form->CreateView()));
    }
    public function editMovieAction(Movies $movies,$id,Request $request)
    {
        $form = $this->createForm(new MoviesType(),$movies,array(
                "action"=>$this->generateUrl("cinema_bo_movie_edit",array('id'=>$movies->getId())),
                "method"=>"POST",
                "attr"=>array("novalidate"=>"novalidate")

            )
        );

        //hydrating $movies, pas besoin de getdata
        $form->handleRequest($request);

        if ($form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($movies);
            $em->flush();
        }
        return $this->render('CinemaBoBundle:Movies:newMovie.html.twig',array("form"=>$form->CreateView()));
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
        //$em =$this->getDoctrine()->getManager();

        //getting the repository for movies
        /*$repoMovies=$em->getRepository("CinemaBoBundle:Movies");
        $listMovies = $repoMovies->findBy(
            array('visible' => 1,'cover'=>1),
            array('id' => 'desc'),
            6,
            0
        );*/

//        $repoMovies=$em->getRepository("CinemaBoBundle:Movies");
//        $listMovies = $repoMovies->getMoviesCovered(6);
        $movie = $this->get('movie');
        $listMovies = $movie->getCover();

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
