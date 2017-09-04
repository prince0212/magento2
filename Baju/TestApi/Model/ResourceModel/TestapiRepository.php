<?php
namespace Baju\TestApi\Model\ResourceModel;

use Baju\TestapiController\Api\TestapiInterface;

/**
 * Front repository.
 */
class TestapiRepository implements TestapiInterface
{

    const SEVERE_ERROR = 0;
    const SUCCESS = 1;
    const LOCAL_ERROR = 2;
 
    protected $_testapiFactory;
   
    /**
     * @param Data\FrontSearchResultInterfaceFactory $searchResultFactory
     * @param DataObjectProcessor $dataObjectProcessor
     * @param DataObjectHelper $dataObjectHelper
     * @param Data\FrontInterfaceFactory $dataFrontFactory
     * @param FrontCollectionFactory $collectionFactory
     */
    public function __construct(
        \Baju\TestApi\Model\TestapiFactory $testapiFactory
    ) {
        $this->_testapiFactory = $testapiFactory;
    }

    /**
     * Add sort order into collection
     *
     * @param FrontCollectionFactory $collection
     * @param array $sortOrders
     * @return void
     */
    private function getName($name)
    {
        echo 'hi! '.$name;
    }
}
