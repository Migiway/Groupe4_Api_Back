<?php

namespace App\AdminBundle\Repository;

use App\AdminBundle\Entity\ParameterCompanySecteur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ParameterCompanySecteur|null find($id, $lockMode = null, $lockVersion = null)
 * @method ParameterCompanySecteur|null findOneBy(array $criteria, array $orderBy = null)
 * @method ParameterCompanySecteur[]    findAll()
 * @method ParameterCompanySecteur[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ParameterCompanySecteurRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ParameterCompanySecteur::class);
    }

    // /**
    //  * @return ParameterCompanySecteur[] Returns an array of ParameterCompanySecteur objects
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
    public function findOneBySomeField($value): ?ParameterCompanySecteur
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
