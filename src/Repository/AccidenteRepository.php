<?php

namespace App\Repository;

use App\Entity\Accidente;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Accidente|null find($id, $lockMode = null, $lockVersion = null)
 * @method Accidente|null findOneBy(array $criteria, array $orderBy = null)
 * @method Accidente[]    findAll()
 * @method Accidente[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AccidenteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Accidente::class);
    }

    // /**
    //  * @return Accidente[] Returns an array of Accidente objects
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
    public function findOneBySomeField($value): ?Accidente
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
