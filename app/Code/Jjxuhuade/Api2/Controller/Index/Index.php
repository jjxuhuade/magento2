<?php
/**
 *
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Jjxuhuade\Api2\Controller\Index;

class Index extends \Magento\Framework\App\Action\Action
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
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
        ini_set("display_errors",1);
        ini_set("error_reporting",E_ALL);
        ini_set("log_errors",1);
        ini_set("max_execution_time",300);
        ini_set("memory_limit",'1024M');
    }


    public function execute($coreRoute = null)
    {
	    
        $resultPage = $this->resultPageFactory->create();
        return $resultPage;
    }
    
    
    function getToken($_username,$_password,$_domain){
        $data = array("username" => $_username, "password" => $_password);
        $data_string = json_encode($data);
        $_token_url=$_domain."/index.php/rest/V1/integration/admin/token";
        $ch = curl_init($_token_url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS,$data_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($data_string))
        );
        $result = curl_exec($ch);
        $_token=(string) json_decode($result);
        $opts = array(
            'http'=>array(
                'header' => 'Authorization: Bearer '.$_token
            )
        );
        $params=array (
            'encoding' => 'UTF-8',
            'verifypeer' => false,
            'verifyhost' => false,
            'soap_version' => SOAP_1_2,
            'trace' => 1, 'exceptions' => 1,
            "connection_timeout" => 180,
            'stream_context' => stream_context_create($opts)
        );
        return $params;
    }
}
