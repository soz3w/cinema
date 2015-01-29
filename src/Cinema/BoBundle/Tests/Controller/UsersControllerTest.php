<?php

namespace Cinema\BoBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Cinema\BoBundle\Entity\User;
use Cinema\BoBundle\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Security\Core\SecurityContext;
use Cinema\BoBundle\Form\LoginType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;

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

// définit certaines valeurs
        $form = $crawler->selectButton('submit')->form();
        $form['_username'] = 'testuser';
        $form['_password'] = 'test';

// soumet le formulaire
        $crawler = $client->submit($form);

        $crawler = $client->followRedirect();
        $this->assertTrue($crawler->filter('html:contains("Bienvenue sur le site cinema")')->count() > 0);

    }

}
