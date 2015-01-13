<?php

namespace Cinema\BoBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping as ORM;

class CommentsRepository extends EntityRepository
{
    public function getComments($limit,$state)
    {
            $query=$this->getEntityManager()->createQuery(
                "SELECT c.id,c.content,c.dateCreated,u.username,m.title as movieTitle,m.id as movieId
                  FROM CinemaBoBundle:Comments c JOIN c.movies m JOIN c.user u
                  WHERE c.state = :state
                  "
            )
            ->setParameter("state",$state)
            ->setMaxResults($limit); //limit

        //setFirstResult for offset


        try {
            $comments = $query->getResult();
        } catch (\Doctrine\Orm\NoResultException $e) {
            $comments = null;
        }

        return $comments;
    }


}
