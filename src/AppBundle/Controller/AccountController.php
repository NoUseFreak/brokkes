<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class AccountController extends Controller
{
    /**
     * @Route("/account", name="account_index")
     */
    public function indexAction()
    {
        return $this->render(':Account:index.html.twig');
    }

    /**
     * @Route("/account/balance", name="account_balance")
     */
    public function balanceAction()
    {
        return $this->render(':Account:balance.html.twig');
    }

}
