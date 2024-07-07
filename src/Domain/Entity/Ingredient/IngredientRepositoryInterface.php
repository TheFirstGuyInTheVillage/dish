<?php

declare(strict_types=1);

namespace App\Domain\Entity\Ingredient;

interface IngredientRepositoryInterface
{
    /**
     * @param array<int, string> $codeList
     * @return list<IngredientInterface>
     */
    public function findAllByTypeCodeList(array $codeList): array;
}