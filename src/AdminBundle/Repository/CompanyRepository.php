<?php

namespace App\AdminBundle\Repository;

use App\AdminBundle\Entity\Company;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Company|null find($id, $lockMode = null, $lockVersion = null)
 * @method Company|null findOneBy(array $criteria, array $orderBy = null)
 * @method Company[]    findAll()
 * @method Company[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CompanyRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Company::class);
    }

    // /**
    //  * @return Company[] Returns an array of Company objects
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
    public function findOneBySomeField($value): ?Company
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
    public function newCompany($time)
    {
        date_default_timezone_set('Europe/Paris');
        $dateNow = date("Y-m-d H:i");
        $dateBefore = date("Y-m-d 00:00", strtotime($time));
        return $this->createQueryBuilder("company")
            ->select("COUNT(company.companyCreationDate) as nb")
            ->where("company.companyCreationDate BETWEEN :date_debut AND :date_fin")
            ->setParameter('date_debut', $dateBefore)
            ->setParameter('date_fin', $dateNow)
            ->getQuery()
            ->getOneOrNullResult();
    }

    public function getEmailBySearch($field, $value)
    {
        return $this->createQueryBuilder('c')
            ->select('c.companyEmail as email')
            ->andWhere("c.$field = :val")
            ->setParameter('val', $value)
            ->getQuery()
            ->getResult();
    }
}
