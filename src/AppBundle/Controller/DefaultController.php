<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction()
    {
        if ($this->getUser()) {
            return $this->render(':Default:index.html.twig');
        } else {
            return $this->render(':Default:splash.html.twig');
        }
    }
}
