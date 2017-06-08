<?php
/**
 * Copyright © 2017 Baju, LLC. All rights reserved.
 * See LICENSE.txt for license details.
 */
namespace Baju\FrontController\Block\Adminhtml\Edit;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

/**
 * Back button on the Front edit form.
 */
class BackButton implements ButtonProviderInterface
{
    /**
     * Url Builder
     *
     * @var \Magento\Framework\UrlInterface
     */
    protected $urlBuilder;

    /**
     * Constructor
     *
     * @param \Magento\Backend\Block\Widget\Context $context
     */
    public function __construct(\Magento\Backend\Block\Widget\Context $context)
    {
        $this->urlBuilder = $context->getUrlBuilder();
    }

    /**
     * Button params that will be used while rendering
     *
     * @return array
     */
    public function getButtonData()
    {
        return [
            'label' => __('Back'),
            'on_click' => sprintf("location.href = '%s';", $this->getBackUrl()),
            'class' => 'back',
            'sort_order' => 10
        ];
    }

    /**
     * Generate url by route and parameters
     *
     * @param array $params
     * @return string
     */
    private function getBackUrl(array $params = [])
    {
        return $this->urlBuilder->getUrl('*/*/', $params);
    }
}
