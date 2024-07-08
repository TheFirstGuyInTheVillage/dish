<?php

namespace App\Application\DishBuilding;

use App\Domain\Service\DishDto;

interface HandlerInterface
{

    /**
     * @param string $typesOrderAsString
     * @return list<DishDto>
     */
    public function handle(string $typesOrderAsString): array;
}