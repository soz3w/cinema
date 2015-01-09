<?php

namespace Cinema\BoBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping as ORM;

class MoviesRepository extends EntityRepository
{
    public function getMoviesCovered()
    {
            $query=$this->getEntityManager()->createQuery(
                "select m
                  from CinemaBoBundle:Movies m
                  where m.visible =1
                  and m.cover=1
                  and m.dateRelease <= :today"
            )
            ->setParameter("today", new \DateTime("now"))
            ->setMaxResults(6); //limit

        //setFirstResult for offset

        return $query->getResult();
    }
    public function getMoviesBest()
    {
        $query=$this->getEntityManager()->createQuery(
            "select m
                  from CinemaBoBundle:Movies m
                  where m.visible =1
                  and m.cover=1
                  and m.dateRelease <= :today"
        )
            ->setParameter("today", new \DateTime("now"))
            ->setMaxResults(6); //limit

        //setFirstResult for offset

        return $query->getResult();
    }
}
