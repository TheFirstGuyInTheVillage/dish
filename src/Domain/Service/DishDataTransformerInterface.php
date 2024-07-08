<?php

declare(strict_types=1);

namespace App\Domain\Service;

interface DishDataTransformerInterface
{
    /**
     * @param array $dishList
     * @return list<DishDto>
     */
    public function transform(array $dishList): array;
}