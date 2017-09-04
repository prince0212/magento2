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
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Baju\TestApi\Api\Data\FrontSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getName($name);

}