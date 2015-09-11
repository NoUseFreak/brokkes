<?php

namespace AppBundle\Module;

use Clastic\CoreBundle\Module\ModuleInterface;

/**
 * Order
 */
class OrderModule implements ModuleInterface
{
    /**
     * The name of the module.
     *
     * @return string
     */
    public function getName()
    {
        return 'Order';
    }

    /**
     * The name of the module.
     *
     * @return string
     */
    public function getIdentifier()
    {
        return 'order';
    }
}
