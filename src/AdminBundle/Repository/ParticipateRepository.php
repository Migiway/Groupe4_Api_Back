<?php

namespace App\AdminBundle\Repository;

use App\AdminBundle\Entity\Participate;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Participate|null find($id, $lockMode = null, $lockVersion = null)
 * @method Participate|null findOneBy(array $criteria, array $orderBy = null)
 * @method Participate[]    findAll()
 * @method Participate[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ParticipateRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Participate::class);
    }

    // /**
    //  * @return Participate[] Returns an array of Participate objects
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
    public function findOneBySomeField($value): ?Participate
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
