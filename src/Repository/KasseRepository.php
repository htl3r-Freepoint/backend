<?php

namespace App\Repository;

use App\Entity\Kasse;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Kasse|null find($id, $lockMode = null, $lockVersion = null)
 * @method Kasse|null findOneBy(array $criteria, array $orderBy = null)
 * @method Kasse[]    findAll()
 * @method Kasse[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class KasseRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Kasse::class);
    }

    // /**
    //  * @return Kasse[] Returns an array of Kasse objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('k')
            ->andWhere('k.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('k.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Kasse
    {
        return $this->createQueryBuilder('k')
            ->andWhere('k.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
