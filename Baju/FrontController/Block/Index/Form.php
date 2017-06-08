<?php

namespace Baju\FrontController\Block\Index;


class Form extends \Magento\Framework\View\Element\Template {

    protected function _prepareLayout()
    {
        return parent::_prepareLayout();
    }

    public function getFormAction()
    {
    	return $this->getUrl('frontcontroller/index/formpost', ['_secure' => true]);
    }

}