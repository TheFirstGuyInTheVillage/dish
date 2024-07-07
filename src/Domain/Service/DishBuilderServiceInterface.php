<?php

namespace App\Domain\Service;

interface DishBuilderServiceInterface
{
    public function buildVariantsByTypes(array $typesOrder): array;
}