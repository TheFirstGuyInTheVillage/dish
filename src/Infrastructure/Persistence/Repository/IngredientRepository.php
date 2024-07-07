<?php

namespace App\Infrastructure\Persistence\Repository;

use App\Domain\Entity\Ingredient\IngredientInterface;
use App\Domain\Entity\Ingredient\IngredientRepositoryInterface;
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

    /**
     * @param array<int, string> $codeList
     * @return list<IngredientInterface>
     */
    public function findAllByTypeCodeList(array $codeList): array
    {
        return $this->createQueryBuilder('i')
            ->select('i')
            ->join('i.type', 'it')
            ->where('it.code IN (:codeList)')
            ->setParameter(':codeList', $codeList)
            ->getQuery()
            ->getResult();
    }
}