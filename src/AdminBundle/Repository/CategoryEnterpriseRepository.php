<?php

namespace App\AdminBundle\Repository;

use App\AdminBundle\Entity\CategoryEnterprise;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method CategoryEnterprise|null find($id, $lockMode = null, $lockVersion = null)
 * @method CategoryEnterprise|null findOneBy(array $criteria, array $orderBy = null)
 * @method CategoryEnterprise[]    findAll()
 * @method CategoryEnterprise[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CategoryEnterpriseRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, CategoryEnterprise::class);
    }

    // /**
    //  * @return CategoryEnterprise[] Returns an array of CategoryEnterprise objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CategoryEnterprise
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
