<?php

namespace App\AdminBundle\Repository;

use App\AdminBundle\Entity\ParameterNoteEcheance;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ParameterNoteEcheance|null find($id, $lockMode = null, $lockVersion = null)
 * @method ParameterNoteEcheance|null findOneBy(array $criteria, array $orderBy = null)
 * @method ParameterNoteEcheance[]    findAll()
 * @method ParameterNoteEcheance[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ParameterNoteEcheanceRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ParameterNoteEcheance::class);
    }

    // /**
    //  * @return ParameterNoteEcheance[] Returns an array of ParameterNoteEcheance objects
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
    public function findOneBySomeField($value): ?ParameterNoteEcheance
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
