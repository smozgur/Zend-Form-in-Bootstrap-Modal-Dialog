<?php
namespace Application\Form;

use Zend\Form\Form;
use Zend\Validator;
use Zend\Form\Element;
use Zend\InputFilter\InputFilterProviderInterface;

/**
 * CustomerForm
 * 
 * Form Class for Customer Model
 * @author Suat Ozgur <smozgur@gmail.com>
 * @version 1.0
 * @package
 * @copyright 2016 batcoder.com
 *
 */
class CustomerForm extends Form implements InputFilterProviderInterface
{
    public function __construct()
    {
        parent::__construct('form-customer');
        
        $this->setAttribute('method', 'post');
        
        $this->add([
            'name' => 'id',
            'attributes' => [
                'id' => 'field-id',  
            ],
            'type' => Element\Hidden::class, 
        ]);

        $this->add([
        	'name' => 'email',
        	'type' => Element\Email::class,
        	'attributes' => [
        		'id' => 'field-email',
        		'placeholder' => 'Email Address',
        		'required' => false,
        	],
        	'options' => [
				'label' => 'Email Address',
        	],
        ]);
        
        $this->add([
        	'name' => 'firstname',
        	'type' => Element\Text::class,
        	'attributes' => [
        		'id' => 'field-firstname',
        		'placeholder' => 'First Name',
        	],
        	'options' => [
        		'label' => 'First Name',
        	],
        ]);

        $this->add([
        	'name' => 'lastname',
        	'type' => Element\Text::class,
        	'attributes' => [
        		'id' => 'field-lastname',
        		'placeholder' => 'Last Name',
        	],
       		'options' => [
        		'label' => 'Last Name',
        	],
        ]);
    }
    
	/**
	 * {@inheritDoc}
	 * @see \Zend\InputFilter\InputFilterProviderInterface::getInputFilterSpecification()
	 */
	public function getInputFilterSpecification() {

		return [
			'email' => [
				'required' => true,
			    'allow_empty' => false,
				'validators' => [
					[
						'name' => Validator\EmailAddress::class,
					],
				],
			],
		];
	}
}