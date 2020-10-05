<?php

namespace App\Repository;

use App\Entity\Angestellte;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Angestellte|null find($id, $lockMode = null, $lockVersion = null)
 * @method Angestellte|null findOneBy(array $criteria, array $orderBy = null)
 * @method Angestellte[]    findAll()
 * @method Angestellte[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AngestellteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Angestellte::class);
    }

    // /**
    //  * @return Angestellte[] Returns an array of Angestellte objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Angestellte
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
