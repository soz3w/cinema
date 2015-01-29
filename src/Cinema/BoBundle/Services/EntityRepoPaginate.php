<?php
namespace Cinema\BoBundle\Services;
use Cinema\BoBundle\Repository;
use Doctrine\ORM\EntityManager;
use Knp\Bundle\PaginatorBundle\Definition\PaginatorAwareInterface;
use Knp\Component\Pager\Paginator;
use Symfony\Component\HttpFoundation\Request;

class EntityRepoPaginate implements PaginatorAwareInterface {

    protected $nb;
    protected $em;
    protected $paginator;
    protected $repo;
    protected $repomethod;

    /**
     * @return mixed
     */
    public function getRepomethod()
    {
        return $this->repomethod;
    }

    /**
     * @param mixed $repomethod
     */
    public function setRepomethod($repomethod)
    {
        $this->repomethod = $repomethod;
    }

    /**
     * @return mixed
     */
    public function getRepo()
    {
        return $this->repo;
    }

    /**
     * @param mixed $repo
     */
    public function setRepo($repo)
    {
        $this->repo = $repo;
    }
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
    public function __construct($nb,EntityManager $em,Paginator $paginator,$repo,$repomethod){
        $this->nb=$nb;
        $this->em=$em;
        $this->paginator = $paginator;
        $this->repo = $repo;
        $this->repomethod = $repomethod;
    }

    public function getList(Request $request)
    {

        $repo=$this->em->getRepository($this->repo);
        if (method_exists($repo,$this->repomethod))
        {
            $query = $repo->{$this->repomethod}($this->nb);
            $pagination = $this->paginator->paginate(
                $query,
                $request->query->get('page', 1)/*page number*/,
                10/*limit per page*/
            );
        }
        else{
            $pagination=null;
        }

        return $pagination;
    }




}