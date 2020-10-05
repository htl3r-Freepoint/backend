<?php

namespace App\Repository;

use App\Entity\UserRabatte;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method UserRabatte|null find($id, $lockMode = null, $lockVersion = null)
 * @method UserRabatte|null findOneBy(array $criteria, array $orderBy = null)
 * @method UserRabatte[]    findAll()
 * @method UserRabatte[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserRabatteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UserRabatte::class);
    }

    // /**
    //  * @return UserRabatte[] Returns an array of UserRabatte objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?UserRabatte
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
