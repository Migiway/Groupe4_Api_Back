<?php

namespace App\Repository;

use App\Entity\Tst;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Tst|null find($id, $lockMode = null, $lockVersion = null)
 * @method Tst|null findOneBy(array $criteria, array $orderBy = null)
 * @method Tst[]    findAll()
 * @method Tst[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TstRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Tst::class);
    }

    // /**
    //  * @return Tst[] Returns an array of Tst objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Tst
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
