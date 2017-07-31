<?php
/**
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Jjxuhuade\Api2\Model\Render;
use Magento\Framework\App\ObjectManager;
/**
 * Adminhtml customers wishlist grid item renderer for item visibility
 */
class Price extends \Magento\Backend\Block\Widget\Grid\Column\Renderer\AbstractRenderer
{
    /**
     * Render the description of given row.
     *
     * @param \Magento\Framework\DataObject $row
     * @return string
     */
    public function render(\Magento\Framework\DataObject $row)
    {
        //Magento\Store\Model\StoreManagerInterface
        //Magento\Store\Model\StoreManager
        return  ObjectManager::getInstance()->get('Magento\Store\Model\StoreManager')
                ->getStore($row->getData('store_id'))
                ->getDefaultCurrency()
                ->format($row->getData('total'),[],false)
                ; 
    }
}
