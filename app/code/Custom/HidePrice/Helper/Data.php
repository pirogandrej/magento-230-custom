<?php

namespace Custom\HidePrice\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\App\Helper\Context;
use Magento\Customer\Model\Session;

class Data extends AbstractHelper
{
    const XML_CONFIG_ENABLE = 'hideprice/configuration/enablehideprice';

    private $httpContext;

    protected $_session;

    public function __construct(
        Context $context,
        \Magento\Framework\App\Http\Context $httpContext,
        Session $session
    ) {
        parent::__construct($context);
        $this->_session = $session;
        $this->httpContext = $httpContext;
    }

    public function isLoggedIn()
    {
        $isLoggedIn = $this->httpContext->getValue(\Magento\Customer\Model\Context::CONTEXT_AUTH);
        return $isLoggedIn;
    }

    public function isCustomerlogin()
    {
        $result = $this->_session->isLoggedIn();
        return $result?true:false;
    }

    public function isHidePrice()
    {
        $result = $this->scopeConfig->getValue(self::XML_CONFIG_ENABLE);
        return $result?true:false;
    }

    public function isHide()
    {
        $isHide = false;
        if (($this->isHidePrice()) && (!$this->isLoggedIn()))
        {
            $isHide = true;
        }
        return $isHide;
    }
}
