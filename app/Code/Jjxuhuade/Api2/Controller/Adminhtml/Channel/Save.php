<?php
/**
 *
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Jjxuhuade\Api2\Controller\Adminhtml\Channel;

class Save extends \Jjxuhuade\Api2\Controller\Adminhtml\Api2
{
    /**
     * Save Action
     *
     * @return \Magento\Backend\Model\View\Result\Redirect
     */
    public function execute()
    {
        $channel = $this->_initObj();
        $data = $this->getRequest()->getPost('channel');
        $back = $this->getRequest()->getParam('back', false);
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        if ($data) {
            $data['id'] = $channel->getId();
            $channel->setData($data);
            try {
                $channel->save();
                $this->messageManager->addSuccess(__('You saved the custom channel.'));
                if ($back) {
                    $resultRedirect->setPath(
                        'api2/*/edit',
                        ['_current' => true, 'id' => $channel->getId()]
                    );
                } else {
                    $resultRedirect->setPath('api2/*/lists');
                }
                return $resultRedirect;
            } catch (\Exception $e) {
                $this->messageManager->addError($e->getMessage());
                return $resultRedirect->setPath('api2/*/edit', ['_current' => true]);
            }
        }
        return $resultRedirect->setPath('api2/*/lists');
    }
}
