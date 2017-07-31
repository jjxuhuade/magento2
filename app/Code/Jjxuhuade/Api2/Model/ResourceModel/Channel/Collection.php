<?php
/**
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Jjxuhuade\Api2\Model\ResourceModel\Channel;

/**
 * Custom Api2 collection
 *
 * @author      Magento Core Team <core@magentocommerce.com>
 */
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * Store Id
     *
     * @var int
     */

    /**
     *  Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        parent::_construct();
        $this->_init('Jjxuhuade\Api2\Model\Channel', 'Jjxuhuade\Api2\Model\ResourceModel\Channel');
    }



    protected function _beforeLoad()
    {
        parent::_beforeLoad();
        //$this->addCurrencyCode();
        return $this;
    }
    
    
   function addCurrencyCode(){
       $stores=ObjectManager::getInstance()->get('Magento\Store\Model\StoreManagerInterface')->getStores();
       $currendy_sql="CASE store_id ";
       //CASE store_id  WHEN 1 THEN 'CNY' WHEN 2 THEN 'USD' END AS currency
       foreach($stores as $store){
          $currendy_sql.="WHEN ".$store->getId()." THEN '".$store->getDefaultCurrencyCode()."' ";
       }
       $currendy_sql.=" END AS currency";
       
       $this->getSelect()->from(false,new \Zend_Db_Expr($currendy_sql));
      // $this->addFieldToFilter('id',['gt'=>26899]);
       return $this;
   }
    
    /**
     * Retrieve option array
     *
     * @return array
     */
    public function toOptionArray()
    {
    }
}
