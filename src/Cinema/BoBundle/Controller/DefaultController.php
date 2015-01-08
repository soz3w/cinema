<?php

namespace Cinema\BoBundle\Controller;

use Cinema\BoBundle\Entity\Movies;
use Cinema\BoBundle\Entity\Categories;
use Cinema\BoBundle\Entity\Tags;
use Doctrine\Common\Util\Debug;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('CinemaBoBundle:Default:index.html.twig', array('name' => $name));
    }
    public function contactAction()
    {
        return $this->render('CinemaBoBundle:Default:contact.html.twig');
    }
    public function blankAction()
    {
        //getting the entity manager
        $em =$this->getDoctrine()->getManager();

        //getting the repository for movies
        $repoMovies=$em->getRepository("CinemaBoBundle:Movies");

        //finding for a movie
        //$movie2= $repoMovies->find(2);
        //$movie2= $repoMovies->findByTitle("night call");
        //$em->remove($movie2);
        //$em->flush();
        //$movies= $repoMovies->findAll();
        //exit(Debug::dump($movie2));


        $category = new Categories();
        $category->setTitle('test');

        $tag =new Tags();
        $tag->setWord('perver');

        $movie = new Movies();
        $movie->addTag($tag);

        $movie->setCategories($category);
        $movie->setTitle('night call');
        $movie->setDescription('on news');
        $movie->setRef(0);
        $movie->setPrice(10);
        $movie->setShopMode(1);
        $movie->setShopTypeDvd(1);
        $movie->setTaxe(0);
        $movie->setDateCreated(new \DateTime('NOW')); //\for native php

        //persist the data in the entity manager (cache)
        $em->persist($category);
        $em->persist($movie);
        $em->persist($tag);


        //updating the database
        $em->flush();


        return $this->render('CinemaBoBundle:Default:blank.html.twig');
    }
}
