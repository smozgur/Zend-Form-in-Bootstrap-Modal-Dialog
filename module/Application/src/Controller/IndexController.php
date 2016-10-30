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
use Application\Model\Customer\CustomerEntity;

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
        $id = (int) $this->params()->fromRoute('id', 0);    

        $customer = $this->customerMapper->fetch($id);
        
        if (!$customer) {
            $customer = new CustomerEntity();
            $id = 0;
        }
        
        $form = new CustomerForm();
        $form->bind($customer);
        
        // All Customers for select drop down
        $customers = $this->customerMapper->fetchAll();
        
        return new ViewModel([
            'id'    => $id,
            'form'  => $form,
            'customers' => $customers,
        ]);
        
    }
}
