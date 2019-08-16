<?php

namespace App\Repository;

use App\Entity\Indicadores;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Indicadores|null find($id, $lockMode = null, $lockVersion = null)
 * @method Indicadores|null findOneBy(array $criteria, array $orderBy = null)
 * @method Indicadores[]    findAll()
 * @method Indicadores[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class IndicadoresRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Indicadores::class);
    }

    // /**
    //  * @return Indicadores[] Returns an array of Indicadores objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Indicadores
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
