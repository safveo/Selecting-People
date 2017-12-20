<?php

namespace UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class UserBundle extends Bundle
{
    // getParent function pour l'extend FOSUserBundle
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
