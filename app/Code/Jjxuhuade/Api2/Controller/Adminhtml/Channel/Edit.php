<?php
/**
 *
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Jjxuhuade\Api2\Controller\Adminhtml\Channel;

use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Edit extends \Jjxuhuade\Api2\Controller\Adminhtml\Api2
{

    /**
     * Index action
     *
     * @return \Magento\Backend\Model\View\Result\Page
     */
    public function execute()
    {
        $obj = $this->_initObj();

        $resultPage = $this->createPage();
        $resultPage->getConfig()->getTitle()->prepend(__('Channel Edit'));
        $resultPage->getConfig()->getTitle()->prepend(
            $obj->getId() ? $obj->getId() : __('New Channel')
        );
        $resultPage->addContent($resultPage->getLayout()->createBlock('Jjxuhuade\Api2\Block\Adminhtml\Channel\Edit'))
            ->addJs(
                $resultPage->getLayout()->createBlock(
                    'Magento\Framework\View\Element\Template',
                    '',
                    ['data' => 
                        ['template' => 'Jjxuhuade_Api2::js.phtml']
                    ]
                )
            );
        return $resultPage;
    }
}
