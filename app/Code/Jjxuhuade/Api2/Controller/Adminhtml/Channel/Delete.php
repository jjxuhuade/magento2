<?php
/**
 *
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Jjxuhuade\Api2\Controller\Adminhtml\Channel;

class Delete extends \Jjxuhuade\Api2\Controller\Adminhtml\Api2
{
    /**
     * Delete Action
     *
     * @return \Magento\Backend\Model\View\Result\Redirect
     */
    public function execute()
    {
        $channel = $this->_initObj();
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        if ($channel->getId()) {
            try {
                $channel->delete();
                $this->messageManager->addSuccess(__('You deleted the channel variable.'));
            } catch (\Exception $e) {
                $this->messageManager->addError($e->getMessage());
                return $resultRedirect->setPath('api2/*/edit', ['_current' => true]);
            }
        }
        return $resultRedirect->setPath('api2/*/lists');
    }
}
