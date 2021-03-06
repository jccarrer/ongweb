<?php

namespace App\Repository;

use App\Entity\Cargos;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Cargos|null find($id, $lockMode = null, $lockVersion = null)
 * @method Cargos|null findOneBy(array $criteria, array $orderBy = null)
 * @method Cargos[]    findAll()
 * @method Cargos[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CargosRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Cargos::class);
    }

    // /**
    //  * @return Cargos[] Returns an array of Cargos objects
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
    public function findOneBySomeField($value): ?Cargos
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
