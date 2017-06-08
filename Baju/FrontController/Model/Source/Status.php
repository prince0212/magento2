<?php
namespace Baju\FrontController\Model\Source;

use Magento\Framework\Data\OptionSourceInterface;

class Status implements OptionSourceInterface
{
    const STATUS_ENABLED = 1;
    const STATUS_DISABLED = 0;

    /**
     * {@inheritdoc}
     */
    public function toOptionArray()
    {
        return [
            [
                'value' => self::STATUS_ENABLED,
                'label' => __('Enabled')
            ],
            [
                'value' => self::STATUS_DISABLED,
                'label' => __('Disabled')
            ]
        ];
    }
}
