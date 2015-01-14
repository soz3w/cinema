<?php

namespace Cinema\BoBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping as ORM;

class SessionsRepository extends EntityRepository
{
    public function getSessions($limit,$dateSession)
    {
            $query=$this->getEntityManager()->createQuery(
                "SELECT s.id,s.dateSession,c.ville,c.title as cinemaTitle,
                    m.title as movieTitle,m.id as movieId,m.image
                  FROM CinemaBoBundle:Sessions s JOIN s.cinema c JOIN s.movies m
                  ORDER BY m.id


                  "
            )

            ->setMaxResults($limit); //limit

        //setFirstResult for offset

            $sessions = $query->getResult();


        return $sessions;
    }


}
