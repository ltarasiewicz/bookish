<?php

namespace Air\BookishBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     * @Template()
     */
    public function indexAction()
    {
        $name = 'lukasz';

        $a = [1, 2, 3, 4, 5];

        array_pop($a);

        return array('name' => $name);
    }
}
