<?php

namespace App\Repository;

use App\Entity\Oxigeno;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Oxigeno|null find($id, $lockMode = null, $lockVersion = null)
 * @method Oxigeno|null findOneBy(array $criteria, array $orderBy = null)
 * @method Oxigeno[]    findAll()
 * @method Oxigeno[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OxigenoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Oxigeno::class);
    }

    // /**
    //  * @return Oxigeno[] Returns an array of Oxigeno objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('o.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Oxigeno
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
