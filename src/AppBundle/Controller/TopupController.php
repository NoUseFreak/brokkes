<?php

namespace AppBundle\Controller;

use Clastic\BackofficeBundle\Controller\AbstractModuleController;
use Symfony\Component\Form\Form;

class TopupController extends AbstractModuleController
{
    /**
     * @return string
     */
    protected function getType()
    {
        return 'topup';
    }

    /**
     * @return string
     */
    protected function getListTemplate()
    {
        return 'AppBundle:Backoffice:Topup/list.html.twig';
    }

    /**
     * @return string
     */
    protected function getEntityName()
    {
        return 'AppBundle:Topup';
    }

    /**
     * @param int|null $id
     *
     * @return mixed
     */
    protected function resolveData($id)
    {
        // TODO: Implement resolveData() method.
    }

    /**
     * @param object $data
     *
     * @return Form
     */
    protected function buildForm($data)
    {
        // TODO: Implement buildForm() method.
    }

    /**
     * @param object $data
     *
     * @return string
     */
    protected function resolveDataTitle($data)
    {
        // TODO: Implement resolveDataTitle() method.
    }
}
