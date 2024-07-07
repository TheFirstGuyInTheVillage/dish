<?php

declare(strict_types=1);

namespace App\Domain\Ingredient;

interface IngredientInterface
{
    public function getId(): int;

    public function getTitle(): ?string;

    public function setTitle(?string $title): self;

    public function getCode(): ?string;

    public function setCode(?string $code): self;
}