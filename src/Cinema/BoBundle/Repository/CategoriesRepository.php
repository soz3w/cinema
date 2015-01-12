<?php

namespace Cinema\BoBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping as ORM;

class CategoriesRepository extends EntityRepository
{
    public function getCategories($limit)
    {
            $query=$this->getEntityManager()->createQuery(
                "SELECT c.id,c.title
                  FROM CinemaBoBundle:Categories c
                  "
            )
            ->setMaxResults($limit); //limit
            //setFirstResult for offset

        try {
            $categories = $query->getResult();
        } catch (\Doctrine\Orm\NoResultException $e) {
            $categories = null;
        }

        return $categories;
    }
    public function getCategoriesWithMovies($limit)
    {
        $query=$this->getEntityManager()->createQuery(
            "SELECT c.id,c.title,count(m.id) as nbMovies
                  FROM CinemaBoBundle:Categories c JOIN c.movies m
                  group by c.id,c.title
                  ORDER BY nbMovies DESC
                  "
        )
            ->setMaxResults($limit); //limit
        //setFirstResult for offset

        try {
            $categories = $query->getResult();
        } catch (\Doctrine\Orm\NoResultException $e) {
            $categories = null;
        }

        return $categories;
    }
    public function countCategories()
    {
        $query=$this->getEntityManager()->createQuery(
            "SELECT count(c.id) as nbCategories
                  FROM CinemaBoBundle:Categories c
                  "
        );
        return $query->getSingleScalarResult();
    }
}
