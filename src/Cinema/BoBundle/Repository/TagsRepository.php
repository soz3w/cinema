<?php

namespace Cinema\BoBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping as ORM;

class TagsRepository extends EntityRepository
{
    public function getTags($limit)
    {
            $query=$this->getEntityManager()->createQuery(
                "SELECT t.id,t.word,count(m.id) as nbMovies
                  FROM CinemaBoBundle:Tags t JOIN t.movies m
                  group by t.id,t.word
                  ORDER BY nbMovies DESC"
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
