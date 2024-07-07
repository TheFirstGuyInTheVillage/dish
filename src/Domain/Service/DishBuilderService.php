<?php

namespace App\Domain\Service;

use App\Domain\Entity\Ingredient\IngredientRepositoryInterface;

readonly class DishBuilderService implements DishBuilderServiceInterface
{
    public function __construct(
        private IngredientRepositoryInterface $ingredientRepository,
    ) {

    }
    public function buildVariantsByTypes(array $typesOrder): array
    {
        $ingredientsList = $this->ingredientRepository->findAllByTypeCodeList(array_unique($typesOrder));
        dump($ingredientsList);
        return [];
    }
}