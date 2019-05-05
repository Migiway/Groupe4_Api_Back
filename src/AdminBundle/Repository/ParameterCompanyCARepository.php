<?php

namespace App\AdminBundle\Repository;

use App\AdminBundle\Entity\ParameterCompanyCA;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ParameterCompanyCA|null find($id, $lockMode = null, $lockVersion = null)
 * @method ParameterCompanyCA|null findOneBy(array $criteria, array $orderBy = null)
 * @method ParameterCompanyCA[]    findAll()
 * @method ParameterCompanyCA[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ParameterCompanyCARepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ParameterCompanyCA::class);
    }

    // /**
    //  * @return ParameterCompanyCA[] Returns an array of ParameterCompanyCA objects
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
    public function findOneBySomeField($value): ?ParameterCompanyCA
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
