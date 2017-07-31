<?php
/**
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Jjxuhuade\Api2\Controller\Adminhtml;

use Magento\Backend\App\Action;

/**
 * Custom Api2s admin controller
 *
 * @author     Magento Core Team <core@magentocommerce.com>
 */
abstract class Api2 extends Action
{
    /**
     * Core registry
     *
     * @var \Magento\Framework\Registry
     */
    protected $_coreRegistry;

    /**
     * @var \Magento\Backend\Model\View\Result\ForwardFactory
     */
    protected $resultForwardFactory;

    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $resultPageFactory;

    /**
     * @var \Magento\Framework\Controller\Result\JsonFactory
     */
    protected $resultJsonFactory;

    /**
     * @var \Magento\Framework\View\LayoutFactory
     */
    protected $layoutFactory;

    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Framework\Registry $coreRegistry
     * @param \Magento\Backend\Model\View\Result\ForwardFactory $resultForwardFactory
     * @param \Magento\Framework\Controller\Result\JsonFactory $resultJsonFactory
     * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory
     * @param \Magento\Framework\View\LayoutFactory $layoutFactory
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\Registry $coreRegistry,
        \Magento\Backend\Model\View\Result\ForwardFactory $resultForwardFactory,
        \Magento\Framework\Controller\Result\JsonFactory $resultJsonFactory,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Magento\Framework\View\LayoutFactory $layoutFactory
    ) {
        $this->_coreRegistry = $coreRegistry;
        parent::__construct($context);
        $this->resultForwardFactory = $resultForwardFactory;
        $this->resultJsonFactory = $resultJsonFactory;
        $this->resultPageFactory = $resultPageFactory;
        $this->layoutFactory = $layoutFactory;
    }

    /**
     * Initialize Layout and set breadcrumbs
     *
     * @return \Magento\Backend\Model\View\Result\Page
     */
    protected function createPage()
    {
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('Jjxuhuade_Api2::api2')
            ->addBreadcrumb(__('Jjxuhuade_Api2'), __('Jjxuhuade_Api2'));
        return $resultPage;
    }

    /**
     * Initialize Variable object
     *
     * @return \Jjxuhuade\Api2\Model\Channel
     */
    protected function _initObj()
    {
        $id = $this->getRequest()->getParam('id', null);
        $storeId = (int)$this->getRequest()->getParam('store_id', 0);
        $obj = $this->_objectManager->create('Jjxuhuade\Api2\Model\Channel');
        if ($id) {
            $obj->setStoreId($storeId)->load($id);
        }
        $this->_coreRegistry->register('current_obj', $obj);
        return $obj;
    }

    /**
     * Check current user permission
     *
     * @return bool
     */
    protected function _isAllowed()
    {
        return true;
    }
}
