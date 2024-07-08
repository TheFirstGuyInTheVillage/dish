<?php

namespace App\Domain\Service;

final readonly class ProductDto
{
    public function __construct(
        public string $type,
        public string $value,
    ) {
    }
}