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
use AppBundle\CommandMessage\UserActivateCheckCommand;
use AppBundle\CommandMessage\UserActivateCommand;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Symfony\Bundle\TwigBundle\TwigEngine;

/**
 * @author Dries De Peuter <dries@nousefreak.be>
 */
class UserActivateCheckHandler
{
    /**
     * @inheritDoc
     */
    public function __invoke(UserActivateCheckCommand $command)
    {
        $user = $command->getUser();
        $hash = $command->getHash();

        $previous = is_null($command->isSuccess()) ? true : $command->isSuccess();
        $current = password_verify($user->getSalt(), urldecode($hash));

        $command->setSuccess($previous && $current);
    }
}
