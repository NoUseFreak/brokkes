<?php

namespace AppBundle\Form\Module;

use Clastic\NodeBundle\Form\Extension\AbstractNodeTypeExtension;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * ShopTypeExtension
 */
class ShopFormExtension extends AbstractNodeTypeExtension
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $this->getTabHelper($builder)->findTab('general')
            ->add('logo', 'file', array('required' => false))
            ->add('description', 'wysiwyg');

        $this->getTabHelper($builder)->createTab('shop_address', 'Address', array(
            'position' => array('after' => 'general')
        ))
            ->add('address', 'address');
    }
}
