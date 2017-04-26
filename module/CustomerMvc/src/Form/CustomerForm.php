<?php
/**
 * plauen-mvc
 *
 * @package    MODULENAME
 * @copyright  Copyright (c) 2014 ralf
 * @license    All rights reserved
 */

namespace CustomerMvc\Form;

use CustomerMvc\Form\Element\CountrySelect;
use Zend\Form\Element\Select;
use Zend\Form\Element\Submit;
use Zend\Form\Element\Text;
use Zend\Form\Form;

class CustomerForm extends Form
{
    public function init()
    {
        $this->setName('customer_form');
        $this->setAttribute('class', 'form-horizontal');

        $firstName = $this->factory->createElement(['type' => Text::class]);
        $firstName->setName('first_name');
        $firstName->setLabel('Vorname');
        $firstName->setAttribute('class', 'form-control');

        $lastName = $this->factory->createElement(['type' => Text::class]);
        $lastName->setName('last_name');
        $lastName->setLabel('Nachname');
        $lastName->setAttribute('class', 'form-control');

        /** @var Select $country */
        $country = $this->factory->createElement(
            ['type' => CountrySelect::class]
        );

        /** @var Submit $submit */
        $submit = $this->factory->createElement(['type' => Submit::class]);
        $submit->setName('customer_save');
        $submit->setValue('Speichern');
        $submit->setAttribute('class', 'btn btn-primary');

        $this->add($firstName);
        $this->add($lastName);
        $this->add($country);
        $this->add($submit);
    }
}