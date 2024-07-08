<?php

declare(strict_types=1);

namespace App\Application\DishBuilding;

use App\Domain\Service\DishBuilderServiceInterface;
use App\Domain\Service\DishDataTransformerInterface;
use App\Domain\Service\DishDto;

final readonly class Handler implements HandlerInterface
{
    public function __construct(
        private DishBuilderServiceInterface $dishBuilderService,
        private DishDataTransformerInterface $dataTransformer,
    ) {

    }

    /**
     * @param string $typesOrderAsString
     * @return list<DishDto>
     */
    public function handle(string $typesOrderAsString): array
    {
        return $this->dataTransformer->transform(
            $this->dishBuilderService->buildVariantsByTypes(str_split($typesOrderAsString)),
        );
    }
}