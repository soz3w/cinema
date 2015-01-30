<?php

namespace Cinema\FoBundle\Tests\Controller;

use Cinema\BoBundle\Tests\Controller\UsersControllerTest;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\Security\Core\SecurityContext;

class MoviesControllerTest extends WebTestCase
{

    protected $client;



    public function testGetMovie()
    {
        //$em =$this->getDoctrine()->getManager();
        //$movie = $em->getRepository("CinemaBoBundle:Movies")->find(2);


        $client = $this->client;

//        $crawler = $client->request('GET', '/movie/2');
//        $this->assertTrue($crawler->filter('html:contains("The hobbit")')->count() > 0);
        $crawler = $client->request('GET', '/administration/director/1');


       // var_dump($client->getRequest()->getRequestUri());
      //  var_dump($client->getResponse()->getContent());
        $this->assertTrue($crawler->filter('html:contains("Peter")')->count() > 0);


    }

    /**
     * @before
     */
    public  function testauthentification()
    {

        $userTest = new UsersControllerTest();
        $this->client=$userTest->testSignin();
        echo "hello";
    }
    /// Annotation valable à partir de phpunit 3.8

}
