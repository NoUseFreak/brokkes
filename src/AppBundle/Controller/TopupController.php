<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Topup;
use AppBundle\Form\Type\TopupType;
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
        if (!is_null($id)) {
            return $this->getDoctrine()->getRepository($this->getEntityName())
                ->find($id);
        }

        return new Topup();
    }

    /**
     * @param object $data
     *
     * @return Form
     */
    protected function buildForm($data)
    {
        return $this->createForm(new TopupType(), $data);
    }

    /**
     * @param Topup $data
     *
     * @return string
     */
    protected function resolveDataTitle($data)
    {
        return $data->getId();
    }
}
