<?php

namespace Custom\HidePrice\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Exception\LocalizedException;
use Custom\HidePrice\Helper\Data as ProductHelper;

class QuoteObserver implements ObserverInterface
{
    protected $_helper;

    public function __construct(ProductHelper $helper) {
        $this->_helper = $helper;
    }

    public function execute(Observer $observer) {
        if ($this->_helper->isHide()) {
            throw new LocalizedException(__('You can not add products to cart.'));
        }
    }
}