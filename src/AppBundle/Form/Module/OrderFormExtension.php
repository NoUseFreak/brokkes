<?php

namespace AppBundle\Form\Module;

use Clastic\NodeBundle\Form\Extension\AbstractNodeTypeExtension;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * OrderTypeExtension
 */
class OrderFormExtension extends AbstractNodeTypeExtension
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $this->getTabHelper($builder)->findTab('general')
            ->add('price', 'money')
            ->add('product', 'entity', array(
                'class' => 'AppBundle:Product',
                'property_path' => 'product',
                'label' => 'Product',
                'required' => true,
            ))
            ->add('user', 'entity', array(
                'class' => 'Clastic\UserBundle\Entity\User',
                'property_path' => 'user',
                'label' => 'User',
                'required' => true,
            ));
    }
}
