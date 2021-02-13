<?php

namespace App\Repository;

use App\Entity\Court;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Court|null find($id, $lockMode = null, $lockVersion = null)
 * @method Court|null findOneBy(array $criteria, array $orderBy = null)
 * @method Court[]    findAll()
 * @method Court[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CourtRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Court::class);
    }

    // /**
    //  * @return Court[] Returns an array of Court objects
    //  */

  /*  public function findByCode($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.courtCode = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }*/



    public function findOneByCode($value): ?Court
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.courtCode = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }

    /**
    * @return Court[] Returns an array of Court objects
    */

    public function findAdministrativeCourts(): ?array
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.courtName like :val1')
            ->setParameter('val1', 'Wojewódzki%')
            ->orWhere('c.courtName like :val2')
            ->setParameter('val2', 'Naczelny%')
            ->getQuery()
            ->getResult();

    }

    /**
     * @return Court[] Returns an array of Court objects
     */
    public function findMilitaryCourts(): ?array
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.courtName like :val1')
            ->setParameter('val1', 'Wojskowy%')
            ->getQuery()
            ->getResult();

    }
}
