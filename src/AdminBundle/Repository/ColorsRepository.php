<?php

namespace App\AdminBundle\Repository;

use App\AdminBundle\Entity\Colors;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Colors|null find($id, $lockMode = null, $lockVersion = null)
 * @method Colors|null findOneBy(array $criteria, array $orderBy = null)
 * @method Colors[]    findAll()
 * @method Colors[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ColorsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Colors::class);
    }

    // /**
    //  * @return Colors[] Returns an array of Colors objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Colors
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
