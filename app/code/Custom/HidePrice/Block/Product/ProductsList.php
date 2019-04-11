<?php

namespace Custom\HidePrice\Block\Product;

use Magento\Framework\Serialize\Serializer\Json;
use Magento\Framework\View\LayoutFactory;
use Magento\Framework\Url\EncoderInterface;
use Magento\CatalogWidget\Block\Product\ProductsList as ProductsListBlock;
use Custom\HidePrice\Helper\Data as ProductHelper;

class ProductsList extends ProductsListBlock
{
    protected $_helper;

    public function __construct
    (
        ProductHelper $helper,
        \Magento\Catalog\Block\Product\Context $context,
        \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollectionFactory,
        \Magento\Catalog\Model\Product\Visibility $catalogProductVisibility,
        \Magento\Framework\App\Http\Context $httpContext,
        \Magento\Rule\Model\Condition\Sql\Builder $sqlBuilder,
        \Magento\CatalogWidget\Model\Rule $rule,
        \Magento\Widget\Helper\Conditions $conditionsHelper,
        array $data = [],
        Json $json = null,
        LayoutFactory $layoutFactory = null,
        EncoderInterface $urlEncoder = null
    )
    {
        $this->_helper = $helper;
        parent::__construct
        (
            $context,
            $productCollectionFactory,
            $catalogProductVisibility,
            $httpContext,
            $sqlBuilder,
            $rule,
            $conditionsHelper,
            $data,
            $json,
            $layoutFactory,
            $urlEncoder
        );
    }

    public function isHide()
    {
        return $this->_helper->isHide();
    }
}
