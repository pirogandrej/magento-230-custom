<?php

namespace Custom\CategoryImageUpload\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\UrlInterface;
use Magento\Framework\Exception\LocalizedException;

class Category extends AbstractHelper
{
    public function getAdditionalImageTypes()
    {
        return array('custom_image');
    }

    public function getImageUrl($image)
    {
        $url = false;
        if ($image) {
            if (is_string($image)) {
                $url = $this->_urlBuilder->getBaseUrl(
                        ['_type' => UrlInterface::URL_TYPE_MEDIA]
                    ) . 'catalog/category/' . $image;
            } else {
                throw new LocalizedException(
                    __('Something went wrong while getting the image url.')
                );
            }
        }
        return $url;
    }
}