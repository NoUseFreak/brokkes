<?php

namespace AppBundle\Module;

use Clastic\NodeBundle\Module\NodeModuleInterface;

/**
 * Company
 */
class CompanyModule implements NodeModuleInterface
{
    /**
     * The name of the module.
     *
     * @return string
     */
    public function getName()
    {
        return 'Company';
    }

    /**
     * The name of the module.
     *
     * @return string
     */
    public function getIdentifier()
    {
        return 'company';
    }

    /**
     * @return string
     */
    public function getEntityName()
    {
        return 'AppBundle:Company';
    }

    /**
     * @return string|bool
     */
    public function getDetailTemplate()
    {
        return 'AppBundle:Company:detail.html.twig';
    }
}
