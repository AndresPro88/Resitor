<?php

namespace App\Repository;

use App\Entity\Residente;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Residente|null find($id, $lockMode = null, $lockVersion = null)
 * @method Residente|null findOneBy(array $criteria, array $orderBy = null)
 * @method Residente[]    findAll()
 * @method Residente[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ResidenteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Residente::class);
    }

    public function BuscarTodosResidentes(){
        return $this->getEntityManager()
            ->createQuery('
            SELECT residente.id, residente.nombre, residente.primer_apellido, residente.segundo_apellido
            FROM App:Residente residente
            ORDER BY residente.primer_apellido
            ')->getResult();
    }
    // /**
    //  * @return Residente[] Returns an array of Residente objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Residente
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
