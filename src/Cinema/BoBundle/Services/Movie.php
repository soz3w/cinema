<?php
namespace Cinema\BoBundle\Services;
use Cinema\BoBundle\Repository;
use Doctrine\ORM\EntityManager;

class Movie {

    protected $nb;
    protected $em;
    /**
     * @return mixed
     */
    public function getNb()
    {
        return $this->nb;
    }/**
     * @param mixed $nb
     */
    public function setNb($nb)
    {
        $this->nb = $nb;
    }
    public function __construct($nb,EntityManager $em){
        $this->nb=$nb;
        $this->em=$em;
    }

    public function getMoviesCovered()
    {

        $repoMovies=$this->em->getRepository("CinemaBoBundle:Movies");
        $listMovies = $repoMovies->getMoviesCovered($this->nb);
        return $listMovies;
    }
    public function getBestMovies()
    {

        $repoMovies=$this->em->getRepository("CinemaBoBundle:Movies");
        $listMovies = $repoMovies->getBestMovies($this->nb);
        return $listMovies;
    }
    public function getBestExpectedMovies()
    {

        $repoMovies=$this->em->getRepository("CinemaBoBundle:Movies");
        $listMovies = $repoMovies->getBestExpectedMovies($this->nb);
        return $listMovies;
    }

    public function countMovies()
    {

        $repoMovies=$this->em->getRepository("CinemaBoBundle:Movies");
        $listMovies = $repoMovies->countMovies();
        return $listMovies;
    }


}