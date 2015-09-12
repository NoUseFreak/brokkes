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
class UserActivateCheckCommand implements NamedMessage
{
    /**
     * @var User
     */
    private $user;

    /**
     * @var string
     */
    private $hash;

    /**
     * @var bool
     */
    private $success;


    /**
     * @param User $user
     */
    public function __construct(User $user, $hash)
    {
        $this->user = $user;
        $this->hash = $hash;
        $this->success = null;
    }

    /**
     * @inheritDoc
     */
    public static function messageName()
    {
        return 'user_activate_check';
    }

    /**
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @return string
     */
    public function getHash()
    {
        return $this->hash;
    }

    /**
     * @return boolean
     */
    public function isSuccess()
    {
        return $this->success;
    }

    /**
     * @param boolean $success
     */
    public function setSuccess($success)
    {
        $this->success = $success;
    }
}
