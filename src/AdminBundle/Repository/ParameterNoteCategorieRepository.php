<?php

namespace App\AdminBundle\Repository;

use App\AdminBundle\Entity\ParameterNoteCategorie;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ParameterNoteCategorie|null find($id, $lockMode = null, $lockVersion = null)
 * @method ParameterNoteCategorie|null findOneBy(array $criteria, array $orderBy = null)
 * @method ParameterNoteCategorie[]    findAll()
 * @method ParameterNoteCategorie[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ParameterNoteCategorieRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ParameterNoteCategorie::class);
    }

    // /**
    //  * @return ParameterNoteCategorie[] Returns an array of ParameterNoteCategorie objects
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
    public function findOneBySomeField($value): ?ParameterNoteCategorie
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
