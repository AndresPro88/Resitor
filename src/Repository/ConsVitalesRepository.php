<?php

namespace App\Repository;

use App\Entity\ConsVitales;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ConsVitales|null find($id, $lockMode = null, $lockVersion = null)
 * @method ConsVitales|null findOneBy(array $criteria, array $orderBy = null)
 * @method ConsVitales[]    findAll()
 * @method ConsVitales[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ConsVitalesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ConsVitales::class);
    }

    // /**
    //  * @return ConsVitales[] Returns an array of ConsVitales objects
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
    public function findOneBySomeField($value): ?ConsVitales
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
