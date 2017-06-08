<?php
namespace Baju\FrontController\Model;

use \Magento\Framework\Model\AbstractModel;

class Front extends AbstractModel implements \Baju\FrontController\Api\Data\FrontInterface
{

	/**
     * Cache tag
     */
    const CACHE_TAG = 'baju_front';

    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Baju\FrontController\Model\ResourceModel\Front');
    }

    /**
     * Get Name
     *
     * @return string|null
     */
    public function getName()
    {
        return $this->getData(self::NAME);
    }

    /**
     * Get Email
     *
     * @return string|null
     */
    public function getEmail()
    {
        return $this->getData(self::EMAIL);
    }

    /**
     * Get Mobile
     *
     * @return string|null
     */
    public function getMobile()
    {
        return $this->getData(self::MOBILE);
    }

    /**
     * Set Name
     *
     * @param string $name
     * @return $this
     */
    public function setName($name)
    {
        return $this->setData(self::NAME, $name);
    }

    /**
     * Set Content
     *
     * @param string $email
     * @return $this
     */
    public function setEmail($email)
    {
        return $this->setData(self::EMAIL, $email);
    }

    /**
     * Set Mobile
     *
     * @param string $mobile
     * @return $this
     */
    public function setMobile($mobile)
    {
        return $this->setData(self::MOBILE, $mobile);
    }
}
?>