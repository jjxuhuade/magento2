<?php
/**
 *
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Jjxuhuade\Api2\Controller\Adminhtml\Channel;

class Validate extends \Jjxuhuade\Api2\Controller\Adminhtml\Api2
{
    /**
     * Validate Action
     *
     * @return \Magento\Framework\Controller\Result\Json
     */
    public function execute()
    {
        $response = new \Magento\Framework\DataObject(['error' => false]);
        $channel = $this->_initObj();
        $channel->addData($this->getRequest()->getPost('channel'));
        $result = $channel->validate();
        if ($result instanceof \Magento\Framework\Phrase) {
            $this->messageManager->addError($result->getText());
            $layout = $this->layoutFactory->create();
            $layout->initMessages();
            $response->setError(true);
            $response->setHtmlMessage($layout->getMessagesBlock()->getGroupedHtml());
        }
        /** @var \Magento\Framework\Controller\Result\Json $resultJson */
        $resultJson = $this->resultJsonFactory->create();
        return $resultJson->setData($response->toArray());
    }
}
