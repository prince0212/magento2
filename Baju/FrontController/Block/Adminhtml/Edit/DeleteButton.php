<?php
/**
 * Copyright © 2017 Front, LLC. All rights reserved.
 * See LICENSE.txt for license details.
 */
namespace Baju\FrontController\Block\Adminhtml\Edit;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;
use Baju\FrontController\Controller\Adminhtml\Index\Edit as EditCont;
/**
 * Back button on the Front edit form.
 */
class DeleteButton implements ButtonProviderInterface
{
    /**
     * Url Builder
     *
     * @var \Magento\Framework\UrlInterface
     */
    protected $urlBuilder;

    /**
     * Registry
     *
     * @var \Magento\Framework\Registry
     */
    protected $registry;

    /**
     * Constructor
     *
     * @param \Magento\Backend\Block\Widget\Context $context
     */
    public function __construct(
		\Magento\Backend\Block\Widget\Context $context,
        \Magento\Framework\Registry $registry
	)
    {
        $this->urlBuilder = $context->getUrlBuilder();
        $this->registry = $registry;
    }

    /**
     * Button params that will be used while rendering
     *
     * @return array
     */
    public function getButtonData()
    {
        $frontId = $this->getFrontId();
        $data = [];
        if ($frontId) {
            $data = [
				'label' => __('Delete'),
				'on_click' => sprintf("location.href = '%s';", $this->getDeleteUrl()),
				'class' => 'delete',
				'sort_order' => 10
			];
        }
		
		return $data;
    }

    /**
     * Generate url by route and parameters
     *
     * @param array $params
     * @return string
     */
    private function getDeleteUrl(array $params = [])
    {
        return $this->urlBuilder->getUrl('*/*/delete', ['front_id'=>$this->getFrontId()]);
    }

    /**
     * Return the Front Id.
     *
     * @return int|null
     */
    public function getFrontId()
    {
        return $this->registry->registry(EditCont::CURRENT_FRONT_ID);
    }
	
	
    
	
}
