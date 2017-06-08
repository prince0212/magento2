<?php
/**
 * Copyright © 2017 Baju, LLC. All rights reserved.
 * See LICENSE.txt for license details.
 */
namespace Baju\FrontController\Ui\DataProvider;

use Baju\FrontController\Model\ResourceModel\Front\Collection;

/**
 * Data provider for the Front edit form.
 */
class EditForm extends \Magento\Ui\DataProvider\AbstractDataProvider
{
    /**
     * @var \Magento\Store\Model\StoreManagerInterface
     */
    protected $_storeManager;
    /**
     * EditForm constructor
     *
     * @param string $name
     * @param string $primaryFieldName
     * @param string $requestFieldName
     * @param Collection $collection
     * @param array $meta
     * @param array $data
     */
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        Collection $collection,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        array $meta = [],
        array $data = []
    ) {
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
        $this->collection = $collection;
        $this->_storeManager = $storeManager;
    }

    /**
     *
     * {@inheritdoc}
     *
     */
    public function getData()
    {
        $result = [];

        $items = $this->collection->getItems();
        foreach ($items as $item) {
            $data = $item->getData();
            /*if (isset($data['image'])) {
                unset($data['image']);
                $data['image'][0]['name'] = $item->getData('image');
                $data['image'][0]['url'] = $this->getImageUrl($item->getData('image'));
            }*/
            if (isset($data['name']) && isset($data['email']) && isset($data['mobile'])) {
                unset($data['name']);
                unset($data['email']);
                unset($data['mobile']);
                $data[0]['name'] = $item->getData('name');
                $data[0]['email'] = $item->getData('email');
                $data[0]['mobile'] = $item->getData('mobile');
            }
            $result[$item->getData('front_id')] = array(
                'front' => $data
            );
        }
        return $result;
    }
    /**
     * Retrieve image URL
     *
     * @return string
     */
    /*public function getImageUrl($image)
    {
        $url = false;
        if ($image) {
            if (is_string($image)) {
                $url = $this->_storeManager->getStore()->getBaseUrl(
                    \Magento\Framework\UrlInterface::URL_TYPE_MEDIA
                ) . 'front/' . $image;
            } else {
                throw new \Magento\Framework\Exception\LocalizedException(
                    __('Something went wrong while getting the image url.')
                );
            }
        }
        return $url;
    }*/
}
