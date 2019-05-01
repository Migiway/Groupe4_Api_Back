<?php

namespace App\AdminBundle\Repository;

use App\AdminBundle\Entity\ParameterTeam;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ParameterTeam|null find($id, $lockMode = null, $lockVersion = null)
 * @method ParameterTeam|null findOneBy(array $criteria, array $orderBy = null)
 * @method ParameterTeam[]    findAll()
 * @method ParameterTeam[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ParameterTeamRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ParameterTeam::class);
    }

    // /**
    //  * @return ParameterTeam[] Returns an array of ParameterTeam objects
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
    public function findOneBySomeField($value): ?ParameterTeam
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
