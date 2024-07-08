<?php

namespace App\Domain\Service;

use App\Domain\Entity\Ingredient\IngredientInterface;

final readonly class DishDataTransformService implements DishDataTransformerInterface
{
    /**
     * @param array $dishList
     * @return list<DishDto>
     */
    public function transform(array $dishList): array
    {
        $specifications = [];
        foreach ($dishList as $dish) {
            $specifications[] = $this->buildFromEntities($dish);
        }

        return $specifications;
    }

    /**
     * @param list<IngredientInterface> $dish
     * @return DishDto
     */
    private function buildFromEntities(array $dish): DishDto
    {
        $products = [];
        $price = 0.00;
        foreach ($dish as $ingredient) {
            $products[] = new ProductDto(
                type : $ingredient->getType()->getTitle(),
                value: $ingredient->getTitle(),
            );
            $price += $ingredient->getPrice();
        }

        return new DishDto(products: $products, price: $price);
    }
}