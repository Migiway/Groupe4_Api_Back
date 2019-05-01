<?php

namespace App\AdminBundle\Repository;

use App\AdminBundle\Entity\ParameterCompany;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ParameterCompany|null find($id, $lockMode = null, $lockVersion = null)
 * @method ParameterCompany|null findOneBy(array $criteria, array $orderBy = null)
 * @method ParameterCompany[]    findAll()
 * @method ParameterCompany[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ParameterCompanyRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ParameterCompany::class);
    }

    // /**
    //  * @return ParameterCompany[] Returns an array of ParameterCompany objects
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
    public function findOneBySomeField($value): ?ParameterCompany
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
