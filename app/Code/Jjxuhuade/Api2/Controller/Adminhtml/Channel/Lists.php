<?php
/**
 *
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Jjxuhuade\Api2\Controller\Adminhtml\Channel;

use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Lists extends \Jjxuhuade\Api2\Controller\Adminhtml\Api2
{

    /**
     * Index action
     *
     * @return \Magento\Backend\Model\View\Result\Page
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('Jjxuhuade_Api2::api2');
        $resultPage->addBreadcrumb(__('Api2'), __('Api2'));
        $resultPage->addBreadcrumb(__('Api2'), __('Api2'));
        $resultPage->getConfig()->getTitle()->prepend(__('Channel Lists'));
        return $resultPage;
    }
}
