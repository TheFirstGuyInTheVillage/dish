<?php

namespace App\Infrastructure\Persistence\Repository;

use App\Domain\IngredientType\IngredientTypeRepositoryInterface;
use App\Infrastructure\Persistence\Entity\IngredientType;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;

/**
 * @extends EntityRepository<IngredientType>
 */
class IngredientTypeRepository extends EntityRepository implements IngredientTypeRepositoryInterface
{
    public function __construct(EntityManagerInterface $entityManager)
    {
        parent::__construct($entityManager, $entityManager->getClassMetadata(IngredientType::class));
    }
}