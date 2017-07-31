<?php
/**
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Jjxuhuade\Api2\Block\Adminhtml;

/**
 * Custom Variable Block
 *
 * @author     Magento Core Team <core@magentocommerce.com>
 */
class Channel extends \Magento\Backend\Block\Widget\Grid\Container
{
    /**
     * Block constructor
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_blockGroup = 'Jjxuhuade_Api2';
        $this->_controller = 'adminhtml_channel';
        $this->_headerText = __('Channel Lists');
        parent::_construct();
        $this->buttonList->update('add', 'label', __('Add New Channel'));
    }
}
