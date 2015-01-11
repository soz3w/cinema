<?php

namespace Cinema\BoBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping as ORM;

class MoviesRepository extends EntityRepository
{
    public function getMoviesCovered($limit)
    {
            $query=$this->getEntityManager()->createQuery(
                "SELECT m
                  FROM CinemaBoBundle:Movies m
                  WHERE m.visible =1
                  AND m.cover=1
                  AND m.dateRelease <= :today"
            )
            ->setParameter("today", new \DateTime("now"))
            ->setMaxResults($limit); //limit

        //setFirstResult for offset

        try {
            $movies = $query->getResult();
        } catch (\Doctrine\Orm\NoResultException $e) {
            $actors = null;
        }

        return $movies;
    }
    public function getBestMovies($limit)
    {
        $query=$this->getEntityManager()->createQuery(
            "SELECT m
                  FROM CinemaBoBundle:Movies m
                  WHERE m.visible =1
                  AND m.cover=1
                  AND m.dateRelease <= :today"
        )
            ->setParameter("today", new \DateTime("now"))
            ->setMaxResults($limit); //limit

        //setFirstResult for offset

        try {
            $movies = $query->getResult();
        } catch (\Doctrine\Orm\NoResultException $e) {
            $actors = null;
        }

        return $movies;
    }
}
