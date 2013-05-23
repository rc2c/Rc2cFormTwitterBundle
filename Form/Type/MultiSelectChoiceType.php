<?php

namespace Rc2c\MultiSelectBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\FormBuilderInterface;

class MultiSelectChoiceType extends AbstractType
{

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'attr' => array(
                'class' => 'multiselect'
            ),
            'expanded'     => false,
            'multiple'     => true,
            'empty_value'  => '',
            
            // multiselect js config
            'btnSelectAll' => true,
            'buttonClass'  => 'btn',
            'maxHeight'    => false,
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->setAttribute('btnSelectAll', $options['btnSelectAll']);
        $builder->setAttribute('buttonClass', $options['buttonClass']);
        $builder->setAttribute('maxHeight', $options['maxHeight']);
    }

    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        $view->vars['btnSelectAll'] = $form->getConfig()->getAttribute('btnSelectAll');
        $view->vars['buttonClass']  = $form->getConfig()->getAttribute('buttonClass');
        $view->vars['maxHeight']    = $form->getConfig()->getAttribute('maxHeight');
    }

    public function getParent()
    {
        return 'choice';
    }

    public function getName()
    {
        return 'multiselectchoice';
    }
}