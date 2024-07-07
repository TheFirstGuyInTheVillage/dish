<?php

namespace App\Application\DishBuilding;

interface HandlerInterface
{
    public function handle(string $typesOrderAsString);
}