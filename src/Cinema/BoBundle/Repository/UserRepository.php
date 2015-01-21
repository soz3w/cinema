<?php

namespace Cinema\BoBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping as ORM;

class UserRepository extends EntityRepository
{


    public function getUsers($limit)
    {
        $query=$this->getEntityManager()->createQuery(
            "SELECT u
                  FROM CinemaBoBundle:User u"
        )
            ->setMaxResults($limit); //limit
        //setFirstResult for offset

        try {
            $users = $query->getResult();
        } catch (\Doctrine\Orm\NoResultException $e) {
            $users = null;
        }

        return $users;
    }


}
