<?php

namespace App\AdminBundle\Repository;

use App\Entity\NbSalary;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method NbSalary|null find($id, $lockMode = null, $lockVersion = null)
 * @method NbSalary|null findOneBy(array $criteria, array $orderBy = null)
 * @method NbSalary[]    findAll()
 * @method NbSalary[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NbSalaryRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, NbSalary::class);
    }

    // /**
    //  * @return NbSalary[] Returns an array of NbSalary objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('n.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?NbSalary
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
