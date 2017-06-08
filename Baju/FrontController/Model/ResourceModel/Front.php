<?php
namespace Baju\FrontController\Model\ResourceModel;

class Front extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('baju_front', 'front_id');
    }
}
?>