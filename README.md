Rc2cMultiSelectBundle
=====================

This bundle provides a symfony 2 form type multiselect powered by twitter bootstrap.

The Bootstrap Multiselect jquery plugin present in this bundle is from [davidstutz](https://github.com/davidstutz/bootstrap-multiselect).


## Requirements

- Symfony 2.x
- Twitter bootstrap and jquery already loaded in your layout


## Installation

Add the repository to your composer.json

    "rc2c/multi-select-bundle": "dev-master"

Run Composer to install the bundle

    php composer.phar update rc2c/multi-select-bundle

Enable the bundle in AppKernel.php

```php    
    new Rc2c\MultiSelectBundle\Rc2cMultiSelectBundle(),
```

## Usage

Use the new form type in a buildForm method in remplacement of a choice type

```php

  public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('my_choices', 'multiselectchoice', array(
                'label'     => ' ',
                'read_only' => true,
                'choices'   => array(...)
                ))
        ;
    }

```
You can set some options to change the behaviour of the widget : 

```php
	array(
		'btnSelectAll' => false, // (default: true) Disables the "select all" button
		'buttonClass'  => 'btn-primary', // (default : "btn") Set the class of the dropdown button 
        'maxHeight'    => 450, // (default: false) Set a max height of the dropdown list
	)
```