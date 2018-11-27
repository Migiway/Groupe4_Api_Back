<?php

namespace App\Repository;

use App\Entity\GraphStyle;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method GraphStyle|null find($id, $lockMode = null, $lockVersion = null)
 * @method GraphStyle|null findOneBy(array $criteria, array $orderBy = null)
 * @method GraphStyle[]    findAll()
 * @method GraphStyle[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GraphStyleRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, GraphStyle::class);
    }

    // /**
    //  * @return GraphStyle[] Returns an array of GraphStyle objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('g.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?GraphStyle
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
