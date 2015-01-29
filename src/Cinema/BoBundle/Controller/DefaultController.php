<?php

namespace Cinema\BoBundle\Controller;

use Cinema\BoBundle\Entity\Movies;
use Cinema\BoBundle\Entity\Categories;
use Cinema\BoBundle\Entity\Tags;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
       // return new RedirectResponse($this->generateUrl("cinema_bo_movies"));
        return $this->render('CinemaBoBundle:Default:index.html.twig');
    }


    public function dashbordAction()
    {
        // return new RedirectResponse($this->generateUrl("cinema_bo_movies"));
        return $this->render('CinemaBoBundle:Default:dashbord.html.twig');
    }


    public function contactAction(Request $request)
    {
        /*if ($request->getMethod()=="POST")
        {

        }*/
        $form = $this->createForm('contact',null,array(
                        "action"=>$this->generateUrl("cinema_bo_contact"),
                        "method"=>"POST",
                        "attr"=>array("novalidate"=>"novalidate")

                                )
                    );
        $form->handleRequest($request);

        if ($form->isValid()) {
            // Les données sont un tableau avec les clés "name", "email", et "message"
            $data = $form->getData();
            var_dump($data);
        }

        return $this->render('CinemaBoBundle:Default:contact.html.twig',array("form"=>$form->CreateView()));
    }


    public function statsAction()
    {
        $em =$this->getDoctrine()->getManager();

        $repoMovies=$em->getRepository("CinemaBoBundle:Movies");
        $nbMovies= $repoMovies->countMovies();

        $repoDirectors=$em->getRepository("CinemaBoBundle:Directors");
        $nbDirectors= $repoDirectors->countDirectors();

        $repoCategories=$em->getRepository("CinemaBoBundle:Categories");
        $nbCategories= $repoCategories->countCategories();

        $repoActors=$em->getRepository("CinemaBoBundle:Actors");
        $nbActors= $repoActors->countActors();

        return $this->render('CinemaBoBundle:Default:stats.html.twig',
            array("nbMovies"=>$nbMovies,"nbDirectors"=>$nbDirectors,
                "nbCategories"=>$nbCategories,"nbActors"=>$nbActors));
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

    ///twitter
    public function getTweetsAction(){

        $tweeter = $this->get('twitter');
        $tweeter->getTweets();
        $contents =$tweeter->getTweets();
        return $this->render('CinemaBoBundle:Twitter:tweets.html.twig',array('contents'=>$contents));
    }
    public function postTweetsAction(Request $request){
        $data = $request->request->all();

        $compte = $data['compte'];
        $message = $data['message'];


        $tweeter = $this->get('twitter');
        $tweeter->setCompte($compte);
        $tweeter->setMessage($message);
        $tweeter->postTweet();
        $contents =$tweeter->getTweets();
        return $this->render('CinemaBoBundle:Twitter:tweets.html.twig',array('contents'=>$contents));
    }
    public function deleteTweetAction(Request $request,$id){
        $tweeter = $this->get('twitter');
        $tweeter->deleteTweet($id);
        $contents =$tweeter->getTweets();
        return $this->render('CinemaBoBundle:Twitter:tweets.html.twig',array('contents'=>$contents));
    }
}
