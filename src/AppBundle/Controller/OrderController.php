<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Purchase;
use AppBundle\Form\Type\OrderType;
use Clastic\BackofficeBundle\Controller\AbstractModuleController;
use Symfony\Component\Form\Form;

class OrderController extends AbstractModuleController
{
    /**
     * @return string
     */
    protected function getType()
    {
        return 'order';
    }

    /**
     * @return string
     */
    protected function getListTemplate()
    {
        return 'AppBundle:Backoffice:Order/list.html.twig';
    }

    /**
     * @return string
     */
    protected function getEntityName()
    {
        return 'AppBundle:Purchase';
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

        return new Purchase();
    }

    /**
     * @param object $data
     *
     * @return Form
     */
    protected function buildForm($data)
    {
        return $this->createForm(new OrderType(), $data);
    }

    /**
     * @param object $data
     *
     * @return string
     */
    protected function resolveDataTitle($data)
    {
        return $data->getId();
    }
}
