<?php
namespace Baju\FrontController\Controller\Adminhtml\Index;

use Baju\FrontController\Controller\Adminhtml\AbstractController;
use Baju\FrontController\Model\ResourceModel\FrontRepository;

/**
 * Front Delete controller
 */
class Delete extends AbstractController
{
   
	
	
    /**
     * Delete Front action
     *
     * @return \Magento\Backend\Model\View\Result\Redirect
     */
    public function execute()
    {
       
       $frontId = (int) $this->getRequest()->getParam('front_id');
        if ($frontId) {
            try {
                $this->frontRepository->deleteById($frontId);
                $this->messageManager->addSuccess(__('You deleted the Front.'));
            } catch (\Exception $exception) {
                $this->messageManager->addError($exception->getMessage());
            }
        }
       
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */        
        $resultRedirect = $this->resultRedirectFactory->create();
        $resultRedirect->setPath('front/index/index');

        return $resultRedirect;
    }
	
    
}
