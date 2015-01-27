<?php
namespace Cinema\BoBundle\Movie;
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

    public function getCover()
    {

        $repoMovies=$this->em->getRepository("CinemaBoBundle:Movies");
        $listMovies = $repoMovies->getMoviesCovered($this->nb);
        return $listMovies;
    }

}