<?php
namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\View\Model\JsonModel;
use Zend\View\Renderer\PhpRenderer;
use Zend\View\Resolver\TemplateMapResolver;
use Zend\Form\View\Helper\Form;

use Application\Model\Customer\CustomerMapper;
use Application\Form\CustomerForm;

/**
 * AjaxController
 * 
 * Controller for Ajax Action Calls
 * @author Suat Ozgur <smozgur@gmail.com>
 * @version 1.0
 * @package 
 * @copyright 2016 batcoder.com
 *
 */
class AjaxController extends AbstractActionController
{
    
    /**
     * 
     * @var CustomerMapper $customerMapper
     */
    protected $customerMapper;
    
	/**
	 * Constructor
	 *
	 */
	public function __construct(CustomerMapper $customerMapper)
	{
	    $this->customerMapper = $customerMapper;
	}
	
    public function editCustomerAction()
    {
        $result = new JsonModel();

        $result->setVariables([
            'success'   => false,
            'title'     => 'Edit Customer',
            'body'      => 'Customer Not Found',
        ]);
        
        if (!$this->getRequest()->isXmlHttpRequest()) {
            return $result;
        }
        
        $id = (int) $this->getRequest()->getPost('id', false);
        $formHelpers = (bool) $this->getRequest()->getPost('formhelpers', false);
        
        $customer = $this->customerMapper->fetch($id);
        
        if (!$customer) {
            return $result;
        }
        
        $form = new CustomerForm();
        $form->bind($customer);
        
        $renderer = new PhpRenderer();
        $resolver = new TemplateMapResolver();
        $resolver->setMap([
            'template-with-formviewhelpers' => __DIR__ . '/../../view/application/ajax/modal-customer-with-formviewhelpers.phtml',
            'template-without-formviewhelpers' => __DIR__ . '/../../view/application/ajax/modal-customer-without-formviewhelpers.phtml',
        ]);
        $renderer->setResolver($resolver);
        
        $view = new ViewModel([
            'form' => $form,
        ]);
        if ($formHelpers) {
            $view->setTemplate('template-with-formviewhelpers');
        } else {
            $view->setTemplate('template-without-formviewhelpers');
        }
        
        $result->setVariables([
            'success'   => true,
            'title'     => 'Edit Customer',
            'body'      => $renderer->render($view),
        ]);
        
        return $result;
    }
}
