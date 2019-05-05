<?php

namespace App\AdminBundle\Repository;

use App\AdminBundle\Entity\ParameterCompanyStatut;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ParameterCompanyStatut|null find($id, $lockMode = null, $lockVersion = null)
 * @method ParameterCompanyStatut|null findOneBy(array $criteria, array $orderBy = null)
 * @method ParameterCompanyStatut[]    findAll()
 * @method ParameterCompanyStatut[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ParameterCompanyStatutRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ParameterCompanyStatut::class);
    }

    // /**
    //  * @return ParameterCompanyStatut[] Returns an array of ParameterCompanyStatut objects
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
    public function findOneBySomeField($value): ?ParameterCompanyStatut
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
