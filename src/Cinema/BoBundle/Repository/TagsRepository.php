<?php

namespace Cinema\BoBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping as ORM;

class TagsRepository extends EntityRepository
{
    public function getTags($limit)
    {
            $query=$this->getEntityManager()->createQuery(
                "select t
                  from CinemaBoBundle:Tags t JOIN t.movies m"
            )
                ->setMaxResults($limit); //limit


        //setFirstResult for offset

        try {
            $tags = $query->getResult();
        } catch (\Doctrine\Orm\NoResultException $e) {
            $tags = null;
        }

        return $tags;
    }
}
