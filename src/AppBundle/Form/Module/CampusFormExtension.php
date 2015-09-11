<?php

namespace AppBundle\Form\Module;

use Clastic\NodeBundle\Form\Extension\AbstractNodeTypeExtension;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * CampusTypeExtension
 */
class CampusFormExtension extends AbstractNodeTypeExtension
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $this->getTabHelper($builder)->findTab('general')
            ->add('company', 'entity', array(
                'class' => 'AppBundle:Company',
                'property_path' => 'company',
                'label' => 'Company',
                'required' => true,
            ))
            ->add('photo', 'file', array('required' => false))
            ->add('description', 'wysiwyg');

        $this->getTabHelper($builder)->createTab('campus_address', 'Address', array(
            'position' => array('after' => 'general')
        ))
            ->add('address', 'address');

        $this->getTabHelper($builder)->createTab('campus_shops', 'Shops', array(
            'position' => array('after' => 'campus_address')
        ))
            ->add('shops', 'entity_multi_select', array(
                'class' => 'AppBundle:Shop',
                'property_path' => 'shops',
                'label' => 'Shops',
                'multiple' => true,
            ));
    }
}
