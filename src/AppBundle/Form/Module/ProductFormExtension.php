<?php

namespace AppBundle\Form\Module;

use Clastic\NodeBundle\Form\Extension\AbstractNodeTypeExtension;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * ProductTypeExtension
 */
class ProductFormExtension extends AbstractNodeTypeExtension
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $this->getTabHelper($builder)->findTab('general')
            ->add('shop', 'entity', array(
                'class' => 'AppBundle:Shop',
                'property_path' => 'shop',
                'label' => 'Shop',
                'required' => true,
            ))
            ->add('photo', 'file', array('required' => false))
            ->add('price', 'money')
            ->add('description', 'wysiwyg');
    }
}
