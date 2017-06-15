<?php
namespace Baju\FrontController\Controller\Adminhtml\Index;

use Baju\FrontController\Controller\Adminhtml\AbstractController;

/**
 * Grid edit action controller.
 */
class Edit extends AbstractController
{
    
	
    /**
     * Registry key where current Front ID is stored
     */
    const CURRENT_FRONT_ID = 'front_id';
	
	/**
     * Execute the action that loads the edit form
     *
     * @return \Magento\Backend\Model\View\Result\Page|\Magento\Backend\Model\View\Result\Redirect
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function execute()
    {
        $frontId = (int) $this->getRequest()->getParam('front_id');

        $resultRedirect = $this->resultRedirectFactory->create();
         if (!$frontId) {
            throw new \Magento\Framework\Exception\LocalizedException(__('Missing front Id'));
        }
        try {
            if (!$frontId) {
				$front = [];
			}else{
				$front = $this->frontRepository->getByFrontId($frontId);
			}
            $this->coreRegistry->register('front_data', $front);
            $this->coreRegistry->register(self::CURRENT_FRONT_ID, $frontId);
            /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
			$resultPage = $this->_initAction();
            $resultPage->getConfig()
                ->getTitle()
                ->prepend(__('Edit Front'));
        } catch (\Magento\Framework\Exception\LocalizedException $e) {
            $this->messageManager->addErrorMessage($e->getMessage());
            return $resultRedirect->setPath('*/*/');
        }

        return $resultPage;
    }
}
