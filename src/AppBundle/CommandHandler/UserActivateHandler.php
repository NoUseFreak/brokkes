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
use AppBundle\CommandMessage\UserActivateCommand;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Symfony\Bundle\TwigBundle\TwigEngine;

/**
 * @author Dries De Peuter <dries@nousefreak.be>
 */
class UserActivateHandler
{
    /**
     * @var RegistryInterface
     */
    private $registry;

    /**
     * @param RegistryInterface $registry
     */
    public function __construct(RegistryInterface $registry)
    {
        $this->registry = $registry;
    }

    /**
     * @inheritDoc
     */
    public function __invoke(UserActivateCommand $command)
    {
        $user = $command->getUser();
        $user->setEnabled(true);

        $em = $this->registry->getManager();
        $em->persist($user);
        $em->flush();
    }
}
