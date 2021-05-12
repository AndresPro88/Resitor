<?php

namespace App\Repository;

use App\Entity\MedicosMAP;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method MedicosMAP|null find($id, $lockMode = null, $lockVersion = null)
 * @method MedicosMAP|null findOneBy(array $criteria, array $orderBy = null)
 * @method MedicosMAP[]    findAll()
 * @method MedicosMAP[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MedicosMAPRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MedicosMAP::class);
    }

    // /**
    //  * @return MedicosMAP[] Returns an array of MedicosMAP objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?MedicosMAP
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
