<?php

namespace App\AdminBundle\Repository;

use App\AdminBundle\Entity\ParameterCompanyEffectifs;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ParameterCompanyEffectifs|null find($id, $lockMode = null, $lockVersion = null)
 * @method ParameterCompanyEffectifs|null findOneBy(array $criteria, array $orderBy = null)
 * @method ParameterCompanyEffectifs[]    findAll()
 * @method ParameterCompanyEffectifs[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ParameterCompanyEffectifsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ParameterCompanyEffectifs::class);
    }

    // /**
    //  * @return ParameterCompanyEffectifs[] Returns an array of ParameterCompanyEffectifs objects
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
    public function findOneBySomeField($value): ?ParameterCompanyEffectifs
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
