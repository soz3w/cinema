<?php

namespace Cinema\BoBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping as ORM;

class TagsRepository extends EntityRepository
{
    public function getTags()
    {
            $query=$this->getEntityManager()->createQuery(
                "select t
                  from CinemaBoBundle:Tags t "
            );


        //setFirstResult for offset

        return $query->getResult();
    }
}
