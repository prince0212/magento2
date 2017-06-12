<?php
/**
 * Copyright © 2016 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Baju\FrontController\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

/**
 * Baju Front interface.
 * @api
 */
interface FrontRepositoryInterface
{
    /**
     * Save front.
     *
     * @param \Baju\FrontController\Api\Data\FrontInterface $front
     * @return \Baju\FrontController\Api\Data\FrontInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(Data\FrontInterface $front);

    /**
     * Retrieve front.
     *
     * @param int $frontId
     * @return \Baju\FrontController\Api\Data\FrontInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getByFrontId($frontId);

    /**
     * Retrieve front matching the specified criteria.
     *
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Baju\FrontController\Api\Data\FrontSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria);

    /**
     * Delete front by ID.
     *
     * @param int $frontId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($frontId);
}