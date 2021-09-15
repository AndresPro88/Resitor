<?php

namespace App\Repository;

use App\Entity\Antibioticos;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Antibioticos|null find($id, $lockMode = null, $lockVersion = null)
 * @method Antibioticos|null findOneBy(array $criteria, array $orderBy = null)
 * @method Antibioticos[]    findAll()
 * @method Antibioticos[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AntibioticosRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Antibioticos::class);
    }

    // /**
    //  * @return Antibioticos[] Returns an array of Antibioticos objects
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
    public function findOneBySomeField($value): ?Antibioticos
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
