<?php

namespace App\Repository;

use App\Entity\CargosProyecto;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method CargosProyecto|null find($id, $lockMode = null, $lockVersion = null)
 * @method CargosProyecto|null findOneBy(array $criteria, array $orderBy = null)
 * @method CargosProyecto[]    findAll()
 * @method CargosProyecto[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CargosProyectoRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, CargosProyecto::class);
    }

    // /**
    //  * @return CargosProyecto[] Returns an array of CargosProyecto objects
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
    public function findOneBySomeField($value): ?CargosProyecto
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
