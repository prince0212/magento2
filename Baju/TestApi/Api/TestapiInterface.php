<?php
/**
 * Copyright © 2016 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Baju\TestApi\Api;

/**
 * Baju Testapi interface.
 * @api
 */
interface TestapiInterface
{
    /**
     * Retrieve front matching the specified criteria.
     *
     * @return \Baju\TestApi\Model\ResourceModel\TestapiRepository
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getName();

}