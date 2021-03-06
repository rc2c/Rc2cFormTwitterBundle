<?php

namespace Rc2c\FormTwitterBundle\Form\Type;

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
            'drop'         => 'down'
        ));

        $resolver->addAllowedValues(array(
            'expanded' => array(false),
            'multiple' => array(true),
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
        $builder->setAttribute('drop', $options['drop']);
    }

    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        $view->vars['btnSelectAll'] = $form->getConfig()->getAttribute('btnSelectAll');
        $view->vars['buttonClass']  = $form->getConfig()->getAttribute('buttonClass');
        $view->vars['maxHeight']    = $form->getConfig()->getAttribute('maxHeight');
        $view->vars['drop']         = $form->getConfig()->getAttribute('drop');
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