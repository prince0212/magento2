<?php
namespace Baju\FrontController\Ui\DataProvider;

/**
 * Data provider for the grid ui component.
 */
class Grid extends \Magento\Framework\View\Element\UiComponent\DataProvider\DataProvider
{
    /**
     * Get data
     *
     * @return array
     */
    public function getData()
    {
        return $this->getSearchResult()->toArray();
    }
}
