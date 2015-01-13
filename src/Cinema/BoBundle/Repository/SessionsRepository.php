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
                    c.ville,m.title as movieTitle,m.id as movieId,m.image
                  FROM CinemaBoBundle:Sessions s JOIN s.movies m JOIN s.cinemas c


                  "
            )

            ->setMaxResults($limit); //limit

        //setFirstResult for offset
        try {
            $sessions = $query->getResult();
        } catch (\Doctrine\Orm\NoResultException $e) {
            $sessions = null;
        }

        return $sessions;
    }


}
