<?php

namespace App\AdminBundle\Repository;

use App\AdminBundle\Entity\ParameterCompanyStatutJuridique;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ParameterCompanyStatutJuridique|null find($id, $lockMode = null, $lockVersion = null)
 * @method ParameterCompanyStatutJuridique|null findOneBy(array $criteria, array $orderBy = null)
 * @method ParameterCompanyStatutJuridique[]    findAll()
 * @method ParameterCompanyStatutJuridique[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ParameterCompanyStatutJuridiqueRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ParameterCompanyStatutJuridique::class);
    }

    // /**
    //  * @return ParameterCompanyStatutJuridique[] Returns an array of ParameterCompanyStatutJuridique objects
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
    public function findOneBySomeField($value): ?ParameterCompanyStatutJuridique
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
