<?php

namespace Baju\FrontController\Block\Index;

use \Magento\Framework\Controller\Result\JsonFactory;
use \Baju\FrontController\Model\FrontFactory;

class Index extends \Magento\Framework\View\Element\Template 
{
    protected $jsonResult = null;
    protected $frontFactory = null;
    
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        JsonFactory $jsonFactory,
        FrontFactory $FrontFactory
        ) {
            parent::__construct($context);
            $this->jsonResult = $jsonFactory->create();
            $this->frontFactory = $FrontFactory;
    }

    protected function _prepareLayout()
    {
        return parent::_prepareLayout();
    }
    
    public function getFrontData()
    {
       $front = $this->frontFactory->create()->getCollection();

       return $front;
    }

}