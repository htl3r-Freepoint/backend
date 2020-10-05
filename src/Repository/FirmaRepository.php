<?php

namespace App\Repository;

use App\Entity\Firma;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Firma|null find($id, $lockMode = null, $lockVersion = null)
 * @method Firma|null findOneBy(array $criteria, array $orderBy = null)
 * @method Firma[]    findAll()
 * @method Firma[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FirmaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Firma::class);
    }

    // /**
    //  * @return Firma[] Returns an array of Firma objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Firma
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
