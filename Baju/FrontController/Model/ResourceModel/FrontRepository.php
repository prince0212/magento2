<?php
namespace Baju\FrontController\Model\ResourceModel;

use Baju\FrontController\Api\Data;
use Baju\FrontController\Api\FrontRepositoryInterface;
use Magento\Framework\Reflection\DataObjectProcessor;
use Magento\Framework\Api\DataObjectHelper;
use Baju\FrontController\Model\ResourceModel\Front\CollectionFactory as FrontCollectionFactory;
use Magento\Framework\Api\SortOrder;
use Baju\FrontController\Model\ResourceModel\Front as FrontResource;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;

/**
 * Front repository.
 */
class FrontRepository implements FrontRepositoryInterface
{
    /**
     * @var Data\FrontSearchResultInterfaceFactory
     */
    protected $searchResultFactory;
    
    /**
     * @var DataObjectProcessor
     */
    protected $dataObjectProcessor;
    
    /**
     * @var DataObjectHelper
     */
    protected $dataObjectHelper;
    
    /**
     * @var Data\FrontInterfaceFactory
     */
    protected $dataFrontFactory;
    
    /**
     * @var FrontCollectionFactory
     */
    protected $frontCollectionFactory;

    /**
     * @var FrontResource
     */
    protected $resourceModel;

    /**
     * @param Data\FrontSearchResultInterfaceFactory $searchResultFactory
     * @param DataObjectProcessor $dataObjectProcessor
     * @param DataObjectHelper $dataObjectHelper
     * @param Data\FrontInterfaceFactory $dataFrontFactory
     * @param FrontCollectionFactory $collectionFactory
     */
    public function __construct(
        //Data\FrontSearchResultInterfaceFactory $searchResultFactory,
        DataObjectProcessor $dataObjectProcessor,
        DataObjectHelper $dataObjectHelper,
        Data\FrontInterfaceFactory $dataFrontFactory,
        FrontCollectionFactory $collectionFactory,
        FrontResource $resourceModel
    ) {
        //$this->searchResultFactory = $searchResultFactory;
        $this->dataObjectProcessor = $dataObjectProcessor;
        $this->dataObjectHelper = $dataObjectHelper;
        $this->dataFrontFactory = $dataFrontFactory;
        $this->frontCollectionFactory = $collectionFactory;
        $this->resourceModel = $resourceModel;
    }

    /**
     * Create or update a Front.
     *
     * @param \Baju\FrontController\Api\Data\FrontInterface $front
     * @return \Baju\FrontController\Api\Data\FrontInterface
     * @throws \Magento\Framework\Exception\InputException If bad input is provided
     * @throws \Magento\Framework\Exception\State\InputMismatchException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(\Baju\FrontController\Api\Data\FrontInterface $front)
    {
        try {
            $this->resourceModel->save($front);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__("Unable to save the Front"));
        }
        return $front;
    }

    /**
     * Retrieve front by id.
     *
     * @param string $front
     * @return \Baju\FrontController\Api\Data\FrontInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function get($frontId)
    {
    }

    /**
     * Get Front by front ID.
     *
     * @param int $frontId
     * @return \Baju\FrontController\Api\Data\FrontInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getByFrontId($frontId)
    {
        $front = $this->dataFrontFactory->create();
        $this->resourceModel->load($front, $frontId);
        if (!$front->getFrontId()) {
            throw new NoSuchEntityException(__('Front with id %1 does not exist', $frontId));
        }
        return $front;
    }

    /**
     * Delete Front by ID.
     *
     * @param int $frontId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($frontId)
    {
        $address = $this->getByFrontId($frontId);
        $this->resourceModel->delete($address);
        return true;
    }

    /**
     * Retrieve Front which match a specified criteria.
     *
     * This call returns an array of objects, but detailed information about each object’s attributes might not be
     * included. See FrontRepositoryInterface to determine
     * which call to use to get detailed information about all attributes for an object.
     *
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Baju\FrontController\Api\Data\FrontSearchResultInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria)
    {
        /*$searchResults = $this->searchResultFactory->create();
        $searchResults->setSearchCriteria($searchCriteria);

        $collection = $this->getCollectionWithFilter($searchCriteria);

        $searchResults->setTotalCount($collection->getSize());
        $sortOrders = $searchCriteria->getSortOrders();
        if ($sortOrders) {
            $this->addSortOrderIntoCollection($collection, $sortOrders);
        }
        $collection->setCurPage($searchCriteria->getCurrentPage());
        $collection->setPageSize($searchCriteria->getPageSize());

        $front = $this->getFrontData($collection);

        $searchResults->setItems($front);
        return $searchResults;*/
    }

    
    /**
     * Get Front data
     *
     * @param \Baju\FrontController\Model\ResourceModel\Front\Collection $collection
     * @return array[]
     */
    private function getFrontData(
        \Baju\FrontController\Model\ResourceModel\Front\Collection $collection
    ) {
        $front = [];
        foreach ($collection as $frontModel) {
            $frontData = $this->dataFrontFactory->create();
            $this->dataObjectHelper->populateWithArray(
                $frontData,
                $frontModel->getData(),
                'Baju\FrontController\Api\Data\FrontInterface'
            );
            $front[] = $this->dataObjectProcessor->buildOutputDataArray(
                $frontData,
                'Baju\FrontController\Api\Data\FrontInterface'
            );
        }
        return $front;
    }

    /**
     * Get collection with filter applyed
     *
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return FrontCollectionFactory
     */
    private function getCollectionWithFilter(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria)
    {
        $collection = $this->frontCollectionFactory->create();
        foreach ($searchCriteria->getFilterGroups() as $filterGroup) {
            foreach ($filterGroup->getFilters() as $filter) {
                $condition = $filter->getConditionType() ?: 'eq';
                $collection->addFieldToFilter($filter->getField(), [$condition => $filter->getValue()]);
            }
        }
        return $collection;
    }

    /**
     * Add sort order into collection
     *
     * @param FrontCollectionFactory $collection
     * @param array $sortOrders
     * @return void
     */
    private function addSortOrderIntoCollection($collection, $sortOrders)
    {
        foreach ($sortOrders as $sortOrder) {
            $collection->addOrder(
                $sortOrder->getField(),
                ($sortOrder->getDirection() == SortOrder::SORT_ASC) ? 'ASC' : 'DESC'
            );
        }
    }
}
