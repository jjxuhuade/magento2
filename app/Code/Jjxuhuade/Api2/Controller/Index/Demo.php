<?php
namespace Jjxuhuade\Api2\Controller\Index;



class Demo extends \Magento\Framework\App\Action\Action
{

    public $collection=null;


    public function execute()
    {
        $channel=$this->_objectManager->get('Jjxuhuade\Api2\Model\Channel');
        $this->collection=$channel;
        return $this->resultFactory->create('page');

    }

}

?>
