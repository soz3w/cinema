<?php

namespace Cinema\BoBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping as ORM;

class CategoriesRepository extends EntityRepository
{
    public function getCategories()
    {
            $query=$this->getEntityManager()->createQuery(
                "select c
                  from CinemaBoBundle:Categories c "
            );


        //setFirstResult for offset

        return $query->getResult();
    }
}
