<?php

namespace AppBundle\Module;

use Clastic\NodeBundle\Module\NodeModuleInterface;

/**
 * Address
 */
class AddressModule implements NodeModuleInterface
{
    /**
     * The name of the module.
     *
     * @return string
     */
    public function getName()
    {
        return 'Address';
    }

    /**
     * The name of the module.
     *
     * @return string
     */
    public function getIdentifier()
    {
        return 'address';
    }

    /**
     * @return string
     */
    public function getEntityName()
    {
        return 'AppBundle:Address';
    }

    /**
     * @return string|bool
     */
    public function getDetailTemplate()
    {
        return 'AppBundle:Address:detail.html.twig';
    }
}
