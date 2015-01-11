<?php

namespace Cinema\BoBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping as ORM;

class CategoriesRepository extends EntityRepository
{
    public function getCategories($limit)
    {
            $query=$this->getEntityManager()->createQuery(
                "SELECT c
                  FROM CinemaBoBundle:Categories c JOIN c.movies m"
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
}
