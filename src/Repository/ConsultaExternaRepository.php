<?php

namespace App\Repository;

use App\Entity\ConsultaExterna;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ConsultaExterna|null find($id, $lockMode = null, $lockVersion = null)
 * @method ConsultaExterna|null findOneBy(array $criteria, array $orderBy = null)
 * @method ConsultaExterna[]    findAll()
 * @method ConsultaExterna[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ConsultaExternaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ConsultaExterna::class);
    }

    // /**
    //  * @return ConsultaExterna[] Returns an array of ConsultaExterna objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ConsultaExterna
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
