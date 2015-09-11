<?php

namespace AppBundle\Module;

use Clastic\CoreBundle\Module\SubmoduleInterface;
use Clastic\NodeBundle\Module\NodeModuleInterface;

/**
 * Campus
 */
class CampusModule implements NodeModuleInterface, SubmoduleInterface
{
    /**
     * The name of the module.
     *
     * @return string
     */
    public function getName()
    {
        return 'Campus';
    }

    /**
     * The name of the module.
     *
     * @return string
     */
    public function getIdentifier()
    {
        return 'campus';
    }

    /**
     * The identifier of the parent module.
     *
     * @return string
     */
    public function getParentIdentifier()
    {
        return 'company';
    }

    /**
     * @return string
     */
    public function getEntityName()
    {
        return 'AppBundle:Campus';
    }

    /**
     * @return string|bool
     */
    public function getDetailTemplate()
    {
        return 'AppBundle:Campus:detail.html.twig';
    }
}
