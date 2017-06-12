<?php
/**
 * Copyright © 2017 Baju, LLC. All rights reserved.
 * See LICENSE.txt for license details.
 */
namespace Baju\FrontController\Controller\Adminhtml;

use Magento\Backend\App\Action;
use Baju\FrontController\Model\ResourceModel\FrontRepository;
use Magento\Framework\Registry;

/**
 * Admin Front abstract controller
 */
abstract class AbstractController extends Action
{
    /**
     * ACL resource
     *
     * @var string
     */
    const ADMIN_RESOURCE = 'Baju_FrontController::front';

    /**
     *
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $resultPageFactory;

    /**
     *
     * @var \Baju\FrontController\Model\ResourceModel\FrontRepository
     */
    protected $frontRepository;

    /**
     * @var Registry
     */
    protected $coreRegistry;

    /**
     * @param Action\Context $context
     * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory
     * @param FrontRepository $frontRepository
     * @param Registry $registry
     */
    public function __construct(
        Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        FrontRepository $frontRepository,
        Registry $registry
    ) {
        $this->resultPageFactory = $resultPageFactory;
        $this->frontRepository = $frontRepository;
        $this->coreRegistry = $registry;
        parent::__construct($context);
    }

    /**
     * Init layout, menu and breadcrumb
     *
     * @return \Magento\Backend\Model\View\Result\Page
     */
    protected function _initAction()
    {
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('Baju_FrontController:front');
        $resultPage->addBreadcrumb(__('FrontController'), __('FrontController'));
        $resultPage->addBreadcrumb(__('FrontController'), __('FrontController'));

        return $resultPage;
    }
}
