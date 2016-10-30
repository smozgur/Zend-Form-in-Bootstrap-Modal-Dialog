<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

use Application\Model\Customer\CustomerMapper;
use Application\Form\CustomerForm;

class IndexController extends AbstractActionController
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
    
    public function indexAction()
    {
        return new ViewModel();
    }
    
    public function customerAction() 
    {
        $id = (int) $this->params()->fromRoute('id', false);    
        
        if ($id === false) {
            // Customer Indes or some error
        } elseif ($id === 0) {
            // New Customer record
        } else {
            // Existing Customer record
            $customer = $this->customerMapper->fetch($id);
            $form = new CustomerForm();
            $form->bind($customer);
        }
        
        return new ViewModel([
            'id'    => $id,
            'form'  => $form,
        ]);
        
    }
}
