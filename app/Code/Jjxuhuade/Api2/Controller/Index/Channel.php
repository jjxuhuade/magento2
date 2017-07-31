<?php
/**
 *
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Jjxuhuade\Api2\Controller\Index;

class Channel extends Index
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


    public function execute($coreRoute = null)
    {
	   $channel=$this->_objectManager->get('Jjxuhuade\Api2\Model\Channel')->load(15746);
	   dump($channel->getData());
	   
	   $collection=$channel->getCollection()->addFieldToFilter('id',['gt'=>15744]);
	   
	   echo $collection->getSelect();
	   exit;
        
	   foreach($collection as $item){
	       dump($item->getData());
	   }
	   
	   
	  //$store=$this->_objectManager->get('Magento\Store\Model\StoreManagerInterface');
	  //dump($store->getStore(2)->getDefaultCurrency()->format(2,[],false));
	  //dump($store->getStore(2)->getDefaultCurrency()->convert(2));
	  //dump($store->getStore(2)->getDefaultCurrency()->getCurrencyCode());
    }
    
    

}
