<?php

namespace App\AdminBundle\Repository;

use App\AdminBundle\Entity\ParameterOperation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ParameterOperation|null find($id, $lockMode = null, $lockVersion = null)
 * @method ParameterOperation|null findOneBy(array $criteria, array $orderBy = null)
 * @method ParameterOperation[]    findAll()
 * @method ParameterOperation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ParameterOperationRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ParameterOperation::class);
    }

    // /**
    //  * @return ParameterOperation[] Returns an array of ParameterOperation objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ParameterOperation
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
