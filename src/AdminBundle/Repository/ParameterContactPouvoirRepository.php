<?php

namespace App\AdminBundle\Repository;

use App\AdminBundle\Entity\ParameterContactPouvoir;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ParameterContactPouvoir|null find($id, $lockMode = null, $lockVersion = null)
 * @method ParameterContactPouvoir|null findOneBy(array $criteria, array $orderBy = null)
 * @method ParameterContactPouvoir[]    findAll()
 * @method ParameterContactPouvoir[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ParameterContactPouvoirRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ParameterContactPouvoir::class);
    }

    // /**
    //  * @return ParameterContactPouvoir[] Returns an array of ParameterContactPouvoir objects
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
    public function findOneBySomeField($value): ?ParameterContactPouvoir
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
