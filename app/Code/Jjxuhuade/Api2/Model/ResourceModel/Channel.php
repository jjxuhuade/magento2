<?php
/**
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */

// @codingStandardsIgnoreFile

namespace Jjxuhuade\Api2\Model\ResourceModel;

/**
 *
 * @author      Magento Core Team <core@magentocommerce.com>
 */
class Channel extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * Constructor
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('meiyu_channel', 'id');
    }

   



    /**
     * Perform actions after object save
     *
     * @param \Magento\Framework\Model\AbstractModel $object
     * @return $this
     */
    protected function _afterSave(\Magento\Framework\Model\AbstractModel $object)
    {
        parent::_afterSave($object);
        return $this;
    }

    /**
     * Retrieve select object for load object data
     *
     * @param string $field
     * @param mixed $value
     * @param \Magento\Framework\Model\AbstractModel $object
     * @return $this
     */
    protected function _getLoadSelect($field, $value, $object)
    {
        $select = parent::_getLoadSelect($field, $value, $object);
        $this->_addValueToSelect($select, $object->getStoreId());
        
        return $select;
    }

    /**
     * Add variable store and default value to select
     *
     * @param \Magento\Framework\DB\Select $select
     * @param integer $storeId
     * @return \Magento\Variable\Model\ResourceModel\Variable
     */
    protected function _addValueToSelect(
        \Magento\Framework\DB\Select $select,
        $storeId = \Magento\Store\Model\Store::DEFAULT_STORE_ID
    ) {
        return $this;
    }
}
