<?php

namespace Baju\FrontController\Controller\Index;

class Form extends \Magento\Framework\App\Action\Action
{

    public function __construct(
        \Magento\Framework\App\Action\Context $context
    )
    {
        parent::__construct($context);
    }
 
    public function execute()
    {
        $this->_view->loadLayout();
        $this->_view->getLayout()->initMessages();
        $this->_view->renderLayout();
    }
}