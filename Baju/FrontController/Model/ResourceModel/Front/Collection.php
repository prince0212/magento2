<?php

namespace Baju\FrontController\Model\ResourceModel\Front;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Baju\FrontController\Model\Front', 'Baju\FrontController\Model\ResourceModel\Front');
    }

}
?>