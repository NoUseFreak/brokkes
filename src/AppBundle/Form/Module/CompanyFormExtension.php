<?php

namespace AppBundle\Form\Module;

use Clastic\NodeBundle\Form\Extension\AbstractNodeTypeExtension;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * CompanyTypeExtension
 */
class CompanyFormExtension extends AbstractNodeTypeExtension
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $this->getTabHelper($builder)->findTab('general')
            ->add('logo', 'text', array('required' => false))
            ->add('description', 'wysiwyg');
    }
}
