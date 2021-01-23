<?php

namespace App\Repository;

use App\Entity\LoginAuthentification;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method LoginAuthentification|null find($id, $lockMode = null, $lockVersion = null)
 * @method LoginAuthentification|null findOneBy(array $criteria, array $orderBy = null)
 * @method LoginAuthentification[]    findAll()
 * @method LoginAuthentification[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LoginAuthentificationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LoginAuthentification::class);
    }

    // /**
    //  * @return LoginAuthentification[] Returns an array of LoginAuthentification objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?LoginAuthentification
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
