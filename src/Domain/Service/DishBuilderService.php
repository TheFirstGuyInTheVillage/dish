<?php

namespace App\Domain\Service;

use App\Domain\Entity\Ingredient\IngredientInterface;
use App\Domain\Entity\Ingredient\IngredientRepositoryInterface;

final readonly class DishBuilderService implements DishBuilderServiceInterface
{
    public function __construct(
        private IngredientRepositoryInterface $ingredientRepository,
    ) {
    }

    public function buildVariantsByTypes(array $typesOrder): array
    {
        /* [ d1, d2, d3, c1, c2, i1, i2, i3, i4 ] */
        $ingredientsList = $this->ingredientRepository->findAllByTypeCodeList(array_unique($typesOrder));

        /* [ d => [d1, d2, d3], c => [c1, c1], i => [i1, i2, i3, i4] ] */
        $categorizedList = [];
        foreach ($ingredientsList as $ingredient) {
            $categorizedList[$ingredient->getType()->getCode()][] = $ingredient;
        }

        /* [d => 1, c => 2, i => 3] */
        $typesOrderCount = [];
        foreach ($typesOrder as $typeCode) {
            isset($typesOrderCount[$typeCode])
                ? $typesOrderCount[$typeCode] ++
                : $typesOrderCount[$typeCode] = 1;
        }

        /* [ 0 => [d1, d2, d3], 1 => [c1], 2 => [c2], 3 => [i1, i2], 4 => [i2, i3], 5 => [i3, i4] ] */
        $ingredientsToOrderList = [];
        foreach ($typesOrder as $orderIndex => $typeCode) {
            $orderItemsCount = count($categorizedList[$typeCode]);
            foreach ($categorizedList[$typeCode] as $ingredient) {
                $ingredientsToOrderList[$orderIndex][] = $ingredient;
                $orderItemsCount--;
                if ($orderItemsCount < $typesOrderCount[$typeCode]) {
                    $typesOrderCount[$typeCode]--;
                    array_shift($categorizedList[$typeCode]);
                    break;
                }
            }
        }

        return $this->buildChains($ingredientsToOrderList);
    }

    private function buildChains(array $ingredientsToOrderList): array
    {
        $chains = [];
        foreach ($ingredientsToOrderList as $orderIndex => $ingredientCandidates) {
            foreach ($ingredientCandidates as $ingredientCandidate) {
                $chains = $this->addItemToChains($chains, $orderIndex, $ingredientCandidate);
            }
        }

        return $chains;
    }

    private function addItemToChains(array $chains, int $orderIndex, IngredientInterface $ingredient): array
    {
        if ($orderIndex === 0) {
            $chain = [0 => $ingredient];
            $chains[] = $chain;
        } else {
            foreach ($chains as $index => $chain) {
                if ($chain[$orderIndex - 1] === $ingredient) {
                    continue;
                } elseif (!isset($chain[$orderIndex])) {
                    $chains[$index][$orderIndex] = $ingredient;
                } elseif ($chain[$orderIndex] !== $ingredient) {
                    $newChain = $chain;
                    $newChain[$orderIndex] = $ingredient;
                    $chains[] = $newChain;
                }
            }
        }

        return $chains;
    }
}