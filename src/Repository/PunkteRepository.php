<?php

namespace App\Repository;

use App\Entity\Punkte;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Punkte|null find($id, $lockMode = null, $lockVersion = null)
 * @method Punkte|null findOneBy(array $criteria, array $orderBy = null)
 * @method Punkte[]    findAll()
 * @method Punkte[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PunkteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Punkte::class);
    }

    // /**
    //  * @return Punkte[] Returns an array of Punkte objects
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
    public function findOneBySomeField($value): ?Punkte
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
