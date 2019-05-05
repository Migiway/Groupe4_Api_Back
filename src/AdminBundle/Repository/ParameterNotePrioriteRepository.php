<?php

namespace App\AdminBundle\Repository;

use App\AdminBundle\Entity\ParameterNotePriorite;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ParameterNotePriorite|null find($id, $lockMode = null, $lockVersion = null)
 * @method ParameterNotePriorite|null findOneBy(array $criteria, array $orderBy = null)
 * @method ParameterNotePriorite[]    findAll()
 * @method ParameterNotePriorite[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ParameterNotePrioriteRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ParameterNotePriorite::class);
    }

    // /**
    //  * @return ParameterNotePriorite[] Returns an array of ParameterNotePriorite objects
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
    public function findOneBySomeField($value): ?ParameterNotePriorite
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
