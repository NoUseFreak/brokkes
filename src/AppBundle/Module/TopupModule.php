<?php

namespace AppBundle\Module;

use Clastic\CoreBundle\Module\ModuleInterface;

/**
 * Topup
 */
class TopupModule implements ModuleInterface
{
    /**
     * The name of the module.
     *
     * @return string
     */
    public function getName()
    {
        return 'Topup';
    }

    /**
     * The name of the module.
     *
     * @return string
     */
    public function getIdentifier()
    {
        return 'topup';
    }
}
