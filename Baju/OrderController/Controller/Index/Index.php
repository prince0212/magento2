<?php

namespace Baju\OrderController\Controller\Index;

class Index extends \Magento\Framework\App\Action\Action
{
    protected $_jsonFactory;
    protected $_order;
    
    public function __construct(
        \Magento\Framework\App\Action\Context $context, 
        \Magento\Framework\Controller\Result\JsonFactory $jsonFactory,
        \Magento\Sales\Api\OrderRepositoryInterface $orderRespository
    )
    {
        parent::__construct($context);
        $this->_jsonFactory = $jsonFactory;
        $this->_order = $orderRespository;
    }
 
    public function execute()
    {
        $jsonPage = $this->_jsonFactory->create();
        $_orderData = $this->_order->get($this->getRequest()->getParam('order_id'));
        
        $data['total'] = $_orderData->getGrandTotal();
        $data['status'] = $_orderData->getStatus();
        foreach($_orderData->getAllItems() as $_items){
            $data['item']['sku'] = $_items->getSku();
            $data['item']['item_id'] = $_items->getItemId();
            $data['item']['price'] = $_items->getPrice();
        }
        $data['total_invoiced'] = $_orderData->getTotalInvoiced();
        return $jsonPage->setData($data);
    }
}