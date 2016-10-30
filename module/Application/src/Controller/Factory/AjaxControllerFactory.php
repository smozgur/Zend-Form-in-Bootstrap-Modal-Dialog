<?php
namespace Application\Controller\Factory;

use Zend\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;

use Application\Controller\AjaxController;
use Application\Model\Customer\CustomerMapper;

/**
 * AjaxControllerFactory
 * 
 * Controller Factory for Ajax Controller
 * @author Suat Ozgur <smozgur@gmail.com>
 * @version 1.0
 * @package
 * @copyright 2016 batcoder.com
 *
 */
class AjaxControllerFactory implements FactoryInterface
{
	/**
	 * Handle invoke calls injecting mappers
	 *
	 * @return AjaxControllerFactory
	 */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        /**
         * 
         * Here is where you are supposed to inject 
         * any dependency to your controller
         */
        $customerMapper = $container->get(CustomerMapper::class);
        
        $controller = new AjaxController($customerMapper);
    	 
        return $controller;
    }
}