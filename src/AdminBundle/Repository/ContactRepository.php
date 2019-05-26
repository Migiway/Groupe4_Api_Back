<?php

namespace App\AdminBundle\Repository;

use App\AdminBundle\Entity\Contact;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Contact|null find($id, $lockMode = null, $lockVersion = null)
 * @method Contact|null findOneBy(array $criteria, array $orderBy = null)
 * @method Contact[]    findAll()
 * @method Contact[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ContactRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Contact::class);
    }

    public function countall()
    {
        return $this->createQueryBuilder('t')
            ->select('count(t.id)')
            ->getQuery()
            ->getSingleScalarResult();
    }

    public function newContact($time)
    {
        date_default_timezone_set('Europe/Paris');
        $dateNow = date("Y-m-d H:i");
        $dateBefore = date("Y-m-d 00:00", strtotime($time));
        return $this->createQueryBuilder("contact")
            ->select("COUNT(contact.contact_dateCreation) as nb")
            ->where("contact.contact_dateCreation BETWEEN :date_debut AND :date_fin")
            ->setParameter('date_debut', $dateBefore)
            ->setParameter('date_fin', $dateNow)
            ->getQuery();
    }
    public function indice($time)
    {
        $dateNow = date("Y-m-d H:i");
        $dateBefore = date("Y-m-d 00:00", strtotime($time));
        return $this->createQueryBuilder("contact")
            ->select("COUNT(contact.contact_dateCreation) as nb")
            ->where("contact.contact_dateCreation BETWEEN :date_debut AND :date_fin")
            ->setParameter('date_debut', $dateBefore)
            ->setParameter('date_fin', $dateNow)
            ->getQuery();
    }


    // /**
    //  * @return Contact[] Returns an array of Contact objects
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
    public function findOneBySomeField($value): ?Contact
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    public function getEmailBySearch($field, $value)
    {
        return $this->createQueryBuilder('c')
            ->select('c.contact_email as email')
            ->andWhere("c.$field = :val")
            ->setParameter('val', $value)
            ->getQuery()
            ->getResult();
    }
}
