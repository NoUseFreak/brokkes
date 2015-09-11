<?php

namespace AppBundle\Module;

use Clastic\CoreBundle\Module\ModuleInterface;

/**
 * Profile
 */
class ProfileModule implements ModuleInterface
{
    /**
     * The name of the module.
     *
     * @return string
     */
    public function getName()
    {
        return 'Profile';
    }

    /**
     * The name of the module.
     *
     * @return string
     */
    public function getIdentifier()
    {
        return 'profile';
    }
}
