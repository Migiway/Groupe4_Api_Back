<?php

namespace App\AdminBundle\Repository;

use App\AdminBundle\Entity\ParameterContactMetier;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ParameterContactMetier|null find($id, $lockMode = null, $lockVersion = null)
 * @method ParameterContactMetier|null findOneBy(array $criteria, array $orderBy = null)
 * @method ParameterContactMetier[]    findAll()
 * @method ParameterContactMetier[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ParameterContactMetierRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ParameterContactMetier::class);
    }

    // /**
    //  * @return ParameterContactMetier[] Returns an array of ParameterContactMetier objects
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
    public function findOneBySomeField($value): ?ParameterContactMetier
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
