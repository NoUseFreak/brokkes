<?php

namespace AppBundle\Controller;

use AppBundle\Form\Model\Registration;
use AppBundle\Form\Type\RegistrationType;
use Clastic\UserBundle\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class UserController extends \FOS\UserBundle\Controller\SecurityController
{

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/register", name="register")
     */
    public function registerAction(Request $request)
    {
        $form = $this->createForm(new RegistrationType(), new Registration());
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            /** @var User $user */
            $user = $form->getData()->getUser();
            $user->setUsername($user->getEmail());
            $user->setEnabled(true);

            $em->persist($user);
            $em->flush();

            $this->addFlash('success', 'Registration completed. Please login.');

            return $this->redirectToRoute('login');
        }

        return $this->render(
          ':User:register.html.twig',
          array('form' => $form->createView())
        );
    }

    /**
     * {@inheritdoc}
     * @Route("/login", name="login")
     */
    public function loginAction(Request $request)
    {
        return parent::loginAction($request);
    }

    /**
     * {@inheritdoc}
     */
    protected function renderLogin(array $data)
    {
        return $this->render(':User:login.html.twig', $data);
    }

    /**
     * {@inheritdoc}
     * @Route("/secure/login_check", name="login_check")
     */
    public function checkAction()
    {
        parent::checkAction();
    }

    /**
     * {@inheritdoc}
     * @Route("/logout", name="logout")
     */
    public function logoutAction()
    {
        parent::logoutAction();
    }
}
