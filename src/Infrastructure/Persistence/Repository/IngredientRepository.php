<?php

namespace App\Infrastructure\Persistence\Repository;

use App\Domain\Ingredient\IngredientRepositoryInterface;
use App\Infrastructure\Persistence\Entity\Ingredient;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;

/**
 * @extends EntityRepository<Ingredient>
 */
class IngredientRepository extends EntityRepository implements IngredientRepositoryInterface
{
    public function __construct(EntityManagerInterface $entityManager)
    {
        parent::__construct($entityManager, $entityManager->getClassMetadata(Ingredient::class));
    }
}