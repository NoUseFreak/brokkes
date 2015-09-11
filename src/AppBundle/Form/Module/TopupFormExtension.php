<?php

namespace AppBundle\Form\Module;

use Clastic\NodeBundle\Form\Extension\AbstractNodeTypeExtension;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * TopupTypeExtension
 */
class TopupFormExtension extends AbstractNodeTypeExtension
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $this->getTabHelper($builder)->findTab('general')
            ->add('amount', 'money')
            ->add('user', 'entity', array(
                'class' => 'Clastic\UserBundle\Entity\User',
                'property_path' => 'user',
                'label' => 'User',
                'required' => true,
            ))            ->add('campus', 'entity', array(
                'class' => 'AppBundle:Campus',
                'property_path' => 'campus',
                'label' => 'Campus',
                'required' => true,
            ));
    }
}
