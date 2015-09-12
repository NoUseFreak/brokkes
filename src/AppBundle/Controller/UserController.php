<?php

namespace AppBundle\Controller;

use AppBundle\CommandMessage\UserRegisterCommand;
use AppBundle\CommandMessage\UserActivateCheckCommand;
use AppBundle\CommandMessage\UserActivateCommand;
use AppBundle\Form\Model\Registration;
use AppBundle\Form\Type\RegistrationType;
use Clastic\UserBundle\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
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
            $this->get('command_bus')
              ->handle(new UserRegisterCommand($form->getData()->getUser()));
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
     * @Route("/activate/{user}/{hash}", name="activate")
     * @ParamConverter("user", class="ClasticUserBundle:User")
     */
    public function activateAction(User $user, $hash)
    {
        $event = new UserActivateCheckCommand($user, $hash);
        $this->get('event_bus')
          ->handle($event);

        if ($event->isSuccess()) {
            $this->get('command_bus')
              ->handle(new UserActivateCommand($user));
            $this->addFlash('success', 'Activation complete!');
        } else {
            $this->addFlash('error', 'Error');
        }

        return $this->redirectToRoute('login');
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
