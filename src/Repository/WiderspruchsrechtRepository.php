<?php

namespace App\Repository;

use App\Entity\Widerspruchsrecht;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Widerspruchsrecht|null find($id, $lockMode = null, $lockVersion = null)
 * @method Widerspruchsrecht|null findOneBy(array $criteria, array $orderBy = null)
 * @method Widerspruchsrecht[]    findAll()
 * @method Widerspruchsrecht[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class WiderspruchsrechtRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Widerspruchsrecht::class);
    }

    // /**
    //  * @return Widerspruchsrecht[] Returns an array of Widerspruchsrecht objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('w')
            ->andWhere('w.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('w.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Widerspruchsrecht
    {
        return $this->createQueryBuilder('w')
            ->andWhere('w.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
