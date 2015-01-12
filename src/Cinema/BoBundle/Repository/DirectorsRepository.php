<?php

namespace Cinema\BoBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping as ORM;

class DirectorsRepository extends EntityRepository
{
    public function getBestDirectors($limit)
    {
            $query=$this->getEntityManager()->createQuery(
                "SELECT d.id,d.firstname,d.lastname,d.image,count(m.id) as nbMovies
                  FROM CinemaBoBundle:Directors d JOIN d.movies m
                  group by d.id,d.firstname,d.lastname,d.image
                  ORDER BY nbMovies DESC
                 "
            )
            ->setMaxResults($limit); //limit

        //setFirstResult for offset


        try {
            $directors = $query->getResult();
        } catch (\Doctrine\Orm\NoResultException $e) {
            $directors = null;
        }

        return $directors;
    }

    public function getDirectors($limit)
    {
        $query=$this->getEntityManager()->createQuery(
            "SELECT d
                  FROM CinemaBoBundle:Directors d"
        )
            ->setMaxResults($limit); //limit
        //setFirstResult for offset

        try {
            $directors = $query->getResult();
        } catch (\Doctrine\Orm\NoResultException $e) {
            $directors = null;
        }

        return $directors;
    }
    public function countDirectors()
    {
        $query=$this->getEntityManager()->createQuery(
            "SELECT count(d.id) as nbDirectors
                  FROM CinemaBoBundle:Directors d
                  "
        );
        return $query->getSingleScalarResult();
    }

}
