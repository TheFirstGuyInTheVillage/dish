<?php

namespace App\Domain\Service;

final readonly class DishDto
{
    public function __construct(
        /** @var list<ProductDto> */
        public array $products,
        public float $price,
    ) {
    }
}