<?php

namespace Cinema\BoBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping as ORM;

class ActorsRepository extends EntityRepository
{
    public function getBestActors($limit)
    {
            $query=$this->getEntityManager()->createQuery(
                "SELECT a.id,a.firstname,a.lastname,a.image,count(m.id) as nbMovies
                  FROM CinemaBoBundle:Actors a JOIN a.movies m
                  group by a.id,a.firstname,a.lastname,a.image
                  ORDER BY nbMovies DESC
                 "
            )
            ->setMaxResults($limit); //limit

        //setFirstResult for offset


        try {
            $actors = $query->getResult();
        } catch (\Doctrine\Orm\NoResultException $e) {
            $actors = null;
        }

        return $actors;
    }

    public function getActors($limit)
    {
        $query=$this->getEntityManager()->createQuery(
            "SELECT a
                  FROM CinemaBoBundle:Actors a"
        )
            ->setMaxResults($limit); //limit
        //setFirstResult for offset



        return $query;
    }
    public function countActors()
    {
        $query=$this->getEntityManager()->createQuery(
            "SELECT count(a.id) as nbActors
                  FROM CinemaBoBundle:Actors a
                  "
        );
        return $query->getSingleScalarResult();
    }

}
