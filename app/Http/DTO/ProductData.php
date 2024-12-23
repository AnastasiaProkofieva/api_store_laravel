<?php

namespace App\Http\DTO;

readonly class ProductData extends BaseDto
{
    public function __construct(
        public string $name,
        public string $description,
        public float $price,
        public int $category_id,
        public string $image,

    ) {
    }
}

