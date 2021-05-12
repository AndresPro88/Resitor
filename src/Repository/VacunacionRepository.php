<?php

namespace App\Repository;

use App\Entity\Vacunacion;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Vacunacion|null find($id, $lockMode = null, $lockVersion = null)
 * @method Vacunacion|null findOneBy(array $criteria, array $orderBy = null)
 * @method Vacunacion[]    findAll()
 * @method Vacunacion[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VacunacionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Vacunacion::class);
    }

    // /**
    //  * @return Vacunacion[] Returns an array of Vacunacion objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('v.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Vacunacion
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
