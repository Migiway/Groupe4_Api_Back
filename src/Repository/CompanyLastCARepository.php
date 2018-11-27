<?php

namespace App\Repository;

use App\Entity\CompanyLastCA;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method CompanyLastCA|null find($id, $lockMode = null, $lockVersion = null)
 * @method CompanyLastCA|null findOneBy(array $criteria, array $orderBy = null)
 * @method CompanyLastCA[]    findAll()
 * @method CompanyLastCA[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CompanyLastCARepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, CompanyLastCA::class);
    }

    // /**
    //  * @return CompanyLastCA[] Returns an array of CompanyLastCA objects
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
    public function findOneBySomeField($value): ?CompanyLastCA
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
