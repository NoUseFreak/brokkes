<?php

namespace AppBundle\Form\Module;

use Clastic\NodeBundle\Form\Extension\AbstractNodeTypeExtension;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * ProfileTypeExtension
 */
class ProfileFormExtension extends AbstractNodeTypeExtension
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $this->getTabHelper($builder)->findTab('general')
            ->add('firstname', 'text')
            ->add('lastname', 'text')
            ->add('photo', 'file', array('required' => false))
            ->add('company', 'entity', array(
                'class' => 'AppBundle:Company',
                'property_path' => 'company',
                'label' => 'Company',
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
