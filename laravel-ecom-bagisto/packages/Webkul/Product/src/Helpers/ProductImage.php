<?php

namespace Webkul\Product\Helpers;

use Webkul\Attribute\Repositories\AttributeOptionRepository as AttributeOption;
use Illuminate\Support\Facades\Storage;

class ProductImage extends AbstractProduct
{
    /**
     * Retrieve collection of gallery images
     *
     * @param Product $product
     * @return array
     */
    public function getGalleryImages($product)
    {
        $images = [];

        if ($product) {
            foreach ($product->images as $image) {
                if (! Storage::has($image->path))
                    continue;

                $images[] = [
                    'small_image_url' => url('cache/small/' . $image->path),
                    'medium_image_url' => url('cache/medium/' . $image->path),
                    'large_image_url' => url('cache/large/' . $image->path),
                    'original_image_url' => url('cache/original/' . $image->path),
                ];
            }
        }

        if (! $product || (! $product->parent_id && !count($images))) {
            $images[] = [
                'small_image_url' => bagisto_asset('images/product/small-product-placeholder.png'),
                'medium_image_url' => bagisto_asset('images/product/meduim-product-placeholder.png'),
                'large_image_url' => bagisto_asset('images/product/large-product-placeholder.png'),
                'original_image_url' => bagisto_asset('images/product/large-product-placeholder.png'),
            ];
        }

        return $images;
    }

    /**
     * Get product's base image
     *
     * @param Product $product
     * @return array
     */
    public function getProductBaseImage($product)
    {
        if ($product && $product->images->count()) {
            $images = $product->images;
            $image = [
                'small_image_url' => url('cache/small/' . $images[0]->path),
                'medium_image_url' => url('cache/medium/' . $images[0]->path),
                'large_image_url' => url('cache/large/' . $images[0]->path),
                'original_image_url' => url('cache/original/' . $images[0]->path),
            ];
        } else {
            $image = [
                'small_image_url' => bagisto_asset('images/product/small-product-placeholder.png'),
                'medium_image_url' => bagisto_asset('images/product/meduim-product-placeholder.png'),
                'large_image_url' => bagisto_asset('images/product/large-product-placeholder.png'),
                'original_image_url' => bagisto_asset('images/product/large-product-placeholder.png'),
            ];
        }

        return $image;
    }
}