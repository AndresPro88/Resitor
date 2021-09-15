<?php

namespace App\Repository;

use App\Entity\ConstantesVitales;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ConstantesVitales|null find($id, $lockMode = null, $lockVersion = null)
 * @method ConstantesVitales|null findOneBy(array $criteria, array $orderBy = null)
 * @method ConstantesVitales[]    findAll()
 * @method ConstantesVitales[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ConstantesVitalesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ConstantesVitales::class);
    }

    // /**
    //  * @return ConstantesVitales[] Returns an array of ConstantesVitales objects
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
    public function findOneBySomeField($value): ?ConstantesVitales
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
