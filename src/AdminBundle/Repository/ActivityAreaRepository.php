<?php

namespace App\AdminBundle\Repository;

use App\Entity\ActivityArea;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ActivityArea|null find($id, $lockMode = null, $lockVersion = null)
 * @method ActivityArea|null findOneBy(array $criteria, array $orderBy = null)
 * @method ActivityArea[]    findAll()
 * @method ActivityArea[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ActivityAreaRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ActivityArea::class);
    }

    // /**
    //  * @return ActivityArea[] Returns an array of ActivityArea objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ActivityArea
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
