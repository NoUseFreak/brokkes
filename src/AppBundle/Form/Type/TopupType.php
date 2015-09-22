<?php

namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class TopupType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                $builder->create('tabs', 'tabs', array('inherit_data' => true))
                    ->add(
                        $this->createTab($builder, 'general', array('label' => 'General'))
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
                            ))
                    )
                    ->add($this->createActionTab($builder))
            );
    }

    /**
     * @param FormBuilderInterface $builder
     * @param string               $name
     * @param array                $options
     *
     * @return FormBuilderInterface
     */
    private function createTab(FormBuilderInterface $builder, $name, $options = array())
    {
        $options = array_replace(
            $options,
            array(
                'inherit_data' => true,
            ));

        return $builder->create($name, 'tabs_tab', $options);
    }

    /**
     * @param FormBuilderInterface $builder
     *
     * @return FormBuilderInterface
     */
    private function createActionTab(FormBuilderInterface $builder)
    {
        return $builder->create('actions', 'tabs_tab_actions', array(
            'mapped' => false,
            'inherit_data' => true,
        ))
            ->add('save', 'submit', array(
                'label' => 'Save',
                'attr' => array('class' => 'btn btn-success'),
            ));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Topup'
        ));
    }

    public function getName()
    {
        return 'topup';
    }
}