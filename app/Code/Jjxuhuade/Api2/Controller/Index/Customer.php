<?php
/**
 *
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Jjxuhuade\Api2\Controller\Index;

class Customer extends Index
{
    /**
     * @var \Magento\Framework\Controller\Result\ForwardFactory
     */
    protected $resultForwardFactory;

    /**
     * @param \Magento\Framework\App\Action\Context $context
     * @param \Magento\Framework\Controller\Result\ForwardFactory $resultForwardFactory
     */
    public function __construct(
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Magento\Framework\App\Action\Context $context
    ) {
        parent::__construct($resultPageFactory,$context);
    }

    /**
	   dump($client->__getFunctions());
	   dump($client->__getTypes());
     */
    public function execute($coreRoute = null)
    {
		header("Content-type: text/html; charset=utf-8"); 
	
		$_username='admin';
		$_password='111111q';
		$_domain="http://mage.dev";
		$api = $_domain.'/soap/default?wsdl&services=customerCustomerRepositoryV1';
		$params=$this->getToken($_username,$_password,$_domain);
        $client = new \SoapClient ( $api, $params );
        $result=$client->customerCustomerRepositoryV1GetById(array('customerId'=>1));
        \Zend_Debug::dump($result);
    }
}
