<?php
/**
 * Copyright © 2016 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Baju\FrontController\Api\Data;

/**
 * Retailer interface.
 * @api
 */
interface FrontInterface
{
    /**#@+
     * Constants for keys of data array. Identical to the name of the getter in snake case
     */
    const ID        = 'front_id';
    const NAME      = 'name';
    const EMAIL     = 'email';
    const MOBILE    = 'mobile';

    /**
     * Get id
     *
     * @return int|null
     */
    public function getFrontId();

    /**
     * Get identifier
     *
     * @return string
     */
    public function getName();

    /**
     * Get title
     *
     * @return string
     */
    public function getEmail();

    /**
     * Get content
     *
     * @return int
     */
    public function getMobile();

    /**
     * Set id
     *
     * @param int $id
     * @return $this
     */
    public function setId($id);

    /**
     * Set name
     *
     * @param string $name
     * @return RetailerInterface
     */
    public function setName($name);

    /**
     * Set country_id
     *
     * @param string $title
     * @return RetailerInterface
     */
    public function setEmail($email);

    /**
     * Set country_id
     *
     * @param string $title
     * @return RetailerInterface
     */
    public function setMobile($mobile);

}