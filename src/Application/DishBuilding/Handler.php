<?php

declare(strict_types=1);

namespace App\Application\DishBuilding;

use App\Domain\Service\DishBuilderServiceInterface;

final readonly class Handler implements HandlerInterface
{
    public function __construct(
        private DishBuilderServiceInterface $dishBuilderService,
    ) {

    }
    public function handle(string $typesOrderAsString)
    {
        return $this->dishBuilderService->buildVariantsByTypes(str_split($typesOrderAsString));
    }
}