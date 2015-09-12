<?php
/**
 * This file is part of the Brökkes package.
 *
 * (c) Dries De Peuter <dries@nousefreak.be>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace AppBundle\CommandMessage;

use Clastic\UserBundle\Entity\User;
use SimpleBus\Message\Name\NamedMessage;

/**
 * @author Dries De Peuter <dries@nousefreak.be>
 */
class UserActivateCommand implements NamedMessage
{
    /**
     * @var User
     */
    private $user;

    /**
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * @inheritDoc
     */
    public static function messageName()
    {
        return 'user_activate';
    }

    /**
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }
}
