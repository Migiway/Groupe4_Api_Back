<?php

namespace App\AdminBundle\Repository;

use App\AdminBundle\Entity\ParameterNote;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ParameterNote|null find($id, $lockMode = null, $lockVersion = null)
 * @method ParameterNote|null findOneBy(array $criteria, array $orderBy = null)
 * @method ParameterNote[]    findAll()
 * @method ParameterNote[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ParameterNoteRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ParameterNote::class);
    }

    // /**
    //  * @return ParameterNote[] Returns an array of ParameterNote objects
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
    public function findOneBySomeField($value): ?ParameterNote
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
