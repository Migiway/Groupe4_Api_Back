<?php

namespace App\AdminBundle\Repository;

use App\AdminBundle\Entity\ParameterTeamZone;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ParameterTeamZone|null find($id, $lockMode = null, $lockVersion = null)
 * @method ParameterTeamZone|null findOneBy(array $criteria, array $orderBy = null)
 * @method ParameterTeamZone[]    findAll()
 * @method ParameterTeamZone[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ParameterTeamZoneRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ParameterTeamZone::class);
    }

    // /**
    //  * @return ParameterTeamZone[] Returns an array of ParameterTeamZone objects
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
    public function findOneBySomeField($value): ?ParameterTeamZone
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
