<?php
/**
 * This file is part of the Brökkes package.
 *
 * (c) Dries De Peuter <dries@nousefreak.be>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace AppBundle\CommandHandler;

use AppBundle\CommandMessage\UserRegisterCommand;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Symfony\Bundle\TwigBundle\TwigEngine;

/**
 * @author Dries De Peuter <dries@nousefreak.be>
 */
class UserRegisterHandler
{
    /**
     * @var RegistryInterface
     */
    private $registry;

    /**
     * @var \Swift_Mailer
     */
    private $mailer;

    /**
     * @var TwigEngine
     */
    private $templating;

    /**
     * @param RegistryInterface $registry
     */
    public function __construct(RegistryInterface $registry, \Swift_Mailer $mailer, TwigEngine $templating)
    {
        $this->registry = $registry;
        $this->mailer = $mailer;
        $this->templating = $templating;
    }

    /**
     * @inheritDoc
     */
    public function __invoke(UserRegisterCommand $command)
    {
        $user = $command->getUser();
        $user->setUsername($user->getEmail());

        $em = $this->registry->getManager();
        $em->persist($user);
        $em->flush();

        $hash = password_hash($user->getSalt(), PASSWORD_DEFAULT);

        $message = \Swift_Message::newInstance()
          ->setSubject('Brökkes Account validation')
          ->setFrom('send@example.com')
          ->setTo($user->getEmail())
          ->setBody(
            $this->templating->render(':Email:registration.html.twig', ['hash' => urlencode($hash), 'user' => $user]),
            'text/html'
          )
          ->addPart(
            $this->templating->render(':Email:registration.txt.twig', ['hash' => urlencode($hash), 'user' => $user]),
            'text/plain'
          );

        $this->mailer->send($message);
    }
}
