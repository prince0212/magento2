<?php
namespace Baju\FrontController\Controller\Adminhtml\Index;

use Baju\FrontController\Controller\Adminhtml\AbstractController;

class NewAction extends AbstractController
{
   public function execute()
    {
        $this->_forward('edit');
    }
}
