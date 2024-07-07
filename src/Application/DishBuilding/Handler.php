<?php

declare(strict_types=1);

namespace App\Application\DishBuilding;

final class Handler implements HandlerInterface
{
    public function handle(string $typesAsString)
    {
        dd($typesAsString);
    }
}