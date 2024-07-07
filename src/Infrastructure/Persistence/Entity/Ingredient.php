<?php

namespace App\Infrastructure\Persistence\Entity;

use App\Domain\IngredientType\IngredientTypeInterface;
use App\Infrastructure\Persistence\Repository\IngredientTypeRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\Orm\Mapping as ORM;

#[ORM\Entity(repositoryClass: IngredientTypeRepository::class)]
#[ORM\Table(name: 'ingredient_type')]
#[ORM\HasLifecycleCallbacks]
class Ingredient implements IngredientTypeInterface
{
    #[ORM\Id]
    #[ORM\Column(name: 'id', type: Types::INTEGER, unique: true, nullable: false)]
    #[ORM\GeneratedValue(strategy: 'IDENTITY')]
    private int $id;

    #[ORM\Column(name: 'title', type: Types::STRING, nullable: true)]
    private ?string $title = null;

    #[ORM\Column(name: 'code', type: Types::STRING, nullable: true)]
    private ?string $code = null;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): self
    {
        $this->title = $title;
        return $this;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(?string $code): self
    {
        $this->code = $code;
        return $this;
    }
}