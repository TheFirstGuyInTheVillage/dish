<?php

declare(strict_types=1);

namespace App\Domain\Entity\Ingredient;

use App\Domain\Entity\IngredientType\IngredientTypeInterface;

interface IngredientInterface
{
    public function getId(): int;

    public function getType(): IngredientTypeInterface;

    public function setType(IngredientTypeInterface $type): self;

    public function getTitle(): string;

    public function setTitle(string $title): self;

    public function getPrice(): float;

    public function setPrice(float $price): self;
}