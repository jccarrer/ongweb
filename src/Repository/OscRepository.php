<?php

namespace App\Repository;

use App\Entity\Osc;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Osc|null find($id, $lockMode = null, $lockVersion = null)
 * @method Osc|null findOneBy(array $criteria, array $orderBy = null)
 * @method Osc[]    findAll()
 * @method Osc[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OscRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Osc::class);
    }

    // /**
    //  * @return Osc[] Returns an array of Osc objects
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
    public function findOneBySomeField($value): ?Osc
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
