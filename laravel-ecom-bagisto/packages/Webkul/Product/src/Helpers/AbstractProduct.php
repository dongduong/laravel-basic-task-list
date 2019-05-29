<?php

namespace Webkul\Product\Helpers;

use Webkul\Product\Models\ProductAttributeValue;

abstract class AbstractProduct
{
    /**
     * Add Channle and Locale filter
     *
     * @param Attribute $attribute
     * @param QB $qb
     * @param sting $alias
     * @return QB
     */
    public function applyChannelLocaleFilter($attribute, $qb, $alias = 'product_attribute_values')
    {
        $channel = request()->get('channel') ?: (core()->getCurrentChannelCode() ?: core()->getDefaultChannelCode());

        $locale = request()->get('locale') ?: app()->getLocale();

        if ($attribute->value_per_channel) {
            if ($attribute->value_per_locale) {
                $qb->where($alias . '.channel', $channel)
                    ->where($alias . '.locale', $locale);
            } else {
                $qb->where($alias . '.channel', $channel);
            }
        } else {
            if ($attribute->value_per_locale) {
                $qb->where($alias . '.locale', $locale);
            }
        }

        return $qb;
    }
}