<?php

namespace App\Repository;

use App\Entity\ParamTypeSite;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ParamTypeSite|null find($id, $lockMode = null, $lockVersion = null)
 * @method ParamTypeSite|null findOneBy(array $criteria, array $orderBy = null)
 * @method ParamTypeSite[]    findAll()
 * @method ParamTypeSite[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ParamTypeSiteRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ParamTypeSite::class);
    }

    // /**
    //  * @return ParamTypeSite[] Returns an array of ParamTypeSite objects
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
    public function findOneBySomeField($value): ?ParamTypeSite
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
