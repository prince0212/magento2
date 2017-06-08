<?php
/**
 * Copyright © 2017 Baju, LLC. All rights reserved.
 * See LICENSE.txt for license details.
 */
namespace Baju\FrontController\Controller\Adminhtml\Index;

use Baju\FrontController\Controller\Adminhtml\AbstractController;
use Baju\FrontController\Model\ResourceModel\FrontRepository;

/**
 * Front edit form save controller
 */
class Save extends AbstractController
{
    /**
     *
     * @var \Magento\Framework\Api\DataObjectHelper
     */
    protected $dataObjectHelper;

    /**
     *
     * @var \Baju\FrontController\Model\Data\FrontFactory
     */
    protected $frontFactory;

    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory
     * @param FrontRepository $frontRepository
     * @param \Magento\Framework\Registry $registry
     * @param \Baju\FrontController\Model\Data\FrontFactory $fronteFactory
     * @param \Magento\Framework\Api\DataObjectHelper $dataObjectHelper
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        FrontRepository $frontRepository,
        \Magento\Framework\Registry $registry,
        \Baju\FrontController\Model\Data\FrontFactory $frontFactory,
        \Magento\Framework\Api\DataObjectHelper $dataObjectHelper
    ) {
        parent::__construct($context, $resultPageFactory, $frontRepository, $registry);
        $this->dataObjectHelper = $dataObjectHelper;
        $this->frontFactory = $frontFactory;
    }
    /**
     * Executes the Front edit form save action
     *
     * @return \Magento\Backend\Model\View\Result\Redirect
     */
     
    public function execute()
    {
        $frontData = $this->getRequest()->getPostValue();

        /*if (isset($originalRequestData['affiliate']['id'])  && !$originalRequestData['affiliate']['id']) {
            unset($originalRequestData['affiliate']['id']);
        }*/

        //$affiliateData = $this->_filterCategoryPostData($originalRequestData['affiliate']);
        $front = $this->frontFactory->create();
        $this->dataObjectHelper->populateWithArray(
            $front,
            $frontData,
            '\Baju\FrontController\Api\Data\FrontInterface'
        );

        try {
            //print_r($originalRequestData['affiliate']); exit;
            $this->frontRepository->save($front);
            $this->messageManager->addSuccessMessage(__('You saved the Data'));
        } catch (\Magento\Framework\Exception\AlreadyExistsException $e) {
            $this->messageManager->addErrorMessage($e->getMessage());
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage($e->getMessage());
        }
        $resultRedirect = $this->resultRedirectFactory->create();
        $resultRedirect->setPath('front/index/index');

        return $resultRedirect;
    }
    /**
     * Filter Affiliate data
     *
     * @param array $rawData
     * @return array
     */
    protected function _filterCategoryPostData(array $rawData)
    {
        $data = $rawData;
        // @todo It is a workaround to prevent saving this data in category model and it has to be refactored in future
        if (isset($data['image']) && is_array($data['image'])) {
            if (!empty($data['image']['delete'])) {
                $data['image'] = null;
            } else {
                if (isset($data['image'][0]['name']) && isset($data['image'][0]['tmp_name'])) {
                    $data['image'] = $data['image'][0]['name'];
                } else {
                    unset($data['image']);
                }
            }
        }
        return $data;
    }
}
