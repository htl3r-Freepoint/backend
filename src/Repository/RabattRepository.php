<?php

namespace App\Repository;

use App\Entity\Rabatt;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Rabatt|null find($id, $lockMode = null, $lockVersion = null)
 * @method Rabatt|null findOneBy(array $criteria, array $orderBy = null)
 * @method Rabatt[]    findAll()
 * @method Rabatt[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RabattRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Rabatt::class);
    }

    // /**
    //  * @return Rabatt[] Returns an array of Rabatt objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Rabatt
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
