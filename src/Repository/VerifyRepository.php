<?php

namespace App\Repository;

use App\Entity\Verify;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Verify|null find($id, $lockMode = null, $lockVersion = null)
 * @method Verify|null findOneBy(array $criteria, array $orderBy = null)
 * @method Verify[]    findAll()
 * @method Verify[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VerifyRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Verify::class);
    }

    // /**
    //  * @return Verify[] Returns an array of Verify objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('v.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Verify
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
