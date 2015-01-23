<?php

namespace Cinema\BoBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class CinemaBoBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
