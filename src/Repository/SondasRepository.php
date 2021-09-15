<?php

namespace App\Repository;

use App\Entity\Sondas;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Sondas|null find($id, $lockMode = null, $lockVersion = null)
 * @method Sondas|null findOneBy(array $criteria, array $orderBy = null)
 * @method Sondas[]    findAll()
 * @method Sondas[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SondasRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Sondas::class);
    }

    // /**
    //  * @return Sondas[] Returns an array of Sondas objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Sondas
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
