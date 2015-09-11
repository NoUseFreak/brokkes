<?php

namespace AppBundle\Module;

use Clastic\CoreBundle\Module\SubmoduleInterface;
use Clastic\NodeBundle\Module\NodeModuleInterface;

/**
 * Product
 */
class ProductModule implements SubmoduleInterface, NodeModuleInterface
{
    /**
     * The name of the module.
     *
     * @return string
     */
    public function getName()
    {
        return 'Product';
    }

    /**
     * The name of the module.
     *
     * @return string
     */
    public function getIdentifier()
    {
        return 'product';
    }

    /**
     * @return string
     */
    public function getEntityName()
    {
        return 'AppBundle:Product';
    }

    /**
     * @return string|bool
     */
    public function getDetailTemplate()
    {
        return 'AppBundle:Product:detail.html.twig';
    }

    /**
     * The identifier of the parent module.
     *
     * @return string
     */
    public function getParentIdentifier()
    {
        return 'shop';
    }
}
