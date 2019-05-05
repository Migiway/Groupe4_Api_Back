<?php

namespace App\AdminBundle\Repository;

use App\AdminBundle\Entity\ParameterTeamDepartement;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ParameterTeamDepartement|null find($id, $lockMode = null, $lockVersion = null)
 * @method ParameterTeamDepartement|null findOneBy(array $criteria, array $orderBy = null)
 * @method ParameterTeamDepartement[]    findAll()
 * @method ParameterTeamDepartement[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ParameterTeamDepartementRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ParameterTeamDepartement::class);
    }

    // /**
    //  * @return ParameterTeamDepartement[] Returns an array of ParameterTeamDepartement objects
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
    public function findOneBySomeField($value): ?ParameterTeamDepartement
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
