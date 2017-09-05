<?php
namespace Baju\TestApi\Model\ResourceModel;

use Baju\TestApi\Api\TestapiInterface;

/**
 * Testapi Repository.
 */
class TestapiRepository implements TestapiInterface
{
    /**
     * Retrieve front matching the specified criteria.
     *
     * @return string
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getName()
    {
        return 'hi! my name is test api';
    }
}
