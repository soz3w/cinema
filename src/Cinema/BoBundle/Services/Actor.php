<?php
namespace Cinema\BoBundle\Services;
use Cinema\BoBundle\Repository;
use Doctrine\ORM\EntityManager;
use Knp\Bundle\PaginatorBundle\Definition\PaginatorAwareInterface;
use Knp\Component\Pager\Paginator;
use Symfony\Component\HttpFoundation\Request;

class Actor implements PaginatorAwareInterface {

    protected $nb;
    protected $em;
    protected $paginator;
    /**
     * @return mixed
     */
    public function getNb()
    {
        return $this->nb;
    }/**
     * @param mixed $nb
     */
    public function setNb($nb)
    {
        $this->nb = $nb;
    }
    public function setPaginator(Paginator $paginator)
    {
        $this->paginator = $paginator;
    }
    public function __construct($nb,EntityManager $em,Paginator $paginator){
        $this->nb=$nb;
        $this->em=$em;
        $this->paginator = $paginator;
    }

    public function getActors(Request $request)
    {

        $repo=$this->em->getRepository("CinemaBoBundle:Actors");
        $query = $repo->getActors($this->nb);
        $pagination = $this->paginator->paginate(
            $query,
            $request->query->get('page', 1)/*page number*/,
            10/*limit per page*/
        );
        return $pagination;
    }




}