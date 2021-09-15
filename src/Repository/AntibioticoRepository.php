<?php

namespace App\Repository;

use App\Entity\Antibiotico;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Antibiotico|null find($id, $lockMode = null, $lockVersion = null)
 * @method Antibiotico|null findOneBy(array $criteria, array $orderBy = null)
 * @method Antibiotico[]    findAll()
 * @method Antibiotico[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AntibioticoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Antibiotico::class);
    }

    // /**
    //  * @return Antibiotico[] Returns an array of Antibiotico objects
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
    public function findOneBySomeField($value): ?Antibiotico
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
