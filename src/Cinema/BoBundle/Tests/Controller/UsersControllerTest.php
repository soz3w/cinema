<?php

namespace Cinema\BoBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\Security\Core\SecurityContext;


class UsersControllerTest extends WebTestCase
{


    public function testSignin()
    {
        $client = static::createClient();


        $crawler = $client->request('GET', '/login');

        $this->assertTrue($crawler->filter('html:contains("Nom utilisateur")')->count() > 0);
        $this->assertTrue($crawler->filter('html:contains("Mot de passe")')->count() > 0);
        $this->assertTrue($crawler->filter('html:contains("Se souvenir de moi")')->count() > 0);
        $this->assertTrue($crawler->filter('html:contains("login")')->count() > 0);


        $form = $crawler->selectButton('login')->form();

        /********************************
         * user ko
         **********************************/

        //bad credentials
        $form['_username'] = 'testuser1';
        $form['_password'] = 'test';
        $crawler = $client->submit($form);

        $this->assertTrue($client->getResponse()->isRedirect());
        $this->assertTrue($client->getResponse()->isRedirect('http://localhost/login'));

        $crawler = $client->followRedirect();
        $this->assertTrue($crawler->filter('html:contains("Bad credentials.")')->count() > 0);

        //var_dump($crawler->filter('body h1')->text());
        //var_dump($client->getRequest()->getUri());



        /**********************************
         * User ok
         *******************************/
        $form['_username'] = 'testuser';
        $form['_password'] = 'test';
        $crawler = $client->submit($form);

        $this->assertTrue($client->getResponse()->isRedirect());
        $this->assertTrue($client->getResponse()->isRedirect('http://localhost/'));

        $crawler = $client->followRedirect();
        $this->assertTrue($crawler->filter('html:contains("Bienvenue")')->count() > 0);


        return $client;



    }

}
