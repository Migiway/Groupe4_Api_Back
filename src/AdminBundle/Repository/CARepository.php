<?php

namespace App\AdminBundle\Repository;

use App\AdminBundle\Entity\CA;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method CA|null find($id, $lockMode = null, $lockVersion = null)
 * @method CA|null findOneBy(array $criteria, array $orderBy = null)
 * @method CA[]    findAll()
 * @method CA[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CARepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, CA::class);
    }

    // /**
    //  * @return CA[] Returns an array of CA objects
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
    public function findOneBySomeField($value): ?CA
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
