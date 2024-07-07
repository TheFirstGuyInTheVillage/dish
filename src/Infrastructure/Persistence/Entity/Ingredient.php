<?php

namespace App\Infrastructure\Persistence\Entity;

use App\Domain\Entity\Ingredient\IngredientInterface;
use App\Domain\Entity\IngredientType\IngredientTypeInterface;
use App\Infrastructure\Persistence\Repository\IngredientRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: IngredientRepository::class)]
#[ORM\Table(name: 'ingredient')]
#[ORM\Index(name: 'FK_ingredient_type_id', columns: ['type_id'])]
#[ORM\HasLifecycleCallbacks]
class Ingredient implements IngredientInterface
{
    #[ORM\Id]
    #[ORM\Column(name: 'id', type: Types::INTEGER, unique: true, nullable: false)]
    #[ORM\GeneratedValue(strategy: 'IDENTITY')]
    private int $id;

    #[ORM\JoinColumn(name: 'type_id', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: IngredientType::class)]
    private IngredientTypeInterface $type;

    #[ORM\Column(name: 'title', type: Types::STRING, nullable: false)]
    private string $title;

    #[ORM\Column(name: 'price', type: Types::FLOAT, nullable: false)]
    private float $price;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;
        return $this;
    }

    public function getType(): IngredientTypeInterface
    {
        return $this->type;
    }

    public function setType(IngredientTypeInterface $type): self
    {
        $this->type = $type;
        return $this;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;
        return $this;
    }
}