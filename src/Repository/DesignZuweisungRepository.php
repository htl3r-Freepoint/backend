<?php

namespace App\Repository;

use App\Entity\DesignZuweisung;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method DesignZuweisung|null find($id, $lockMode = null, $lockVersion = null)
 * @method DesignZuweisung|null findOneBy(array $criteria, array $orderBy = null)
 * @method DesignZuweisung[]    findAll()
 * @method DesignZuweisung[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DesignZuweisungRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DesignZuweisung::class);
    }

    // /**
    //  * @return DesignZuweisung[] Returns an array of DesignZuweisung objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?DesignZuweisung
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
