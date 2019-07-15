<?php

namespace App\Repository;

use App\Entity\OSC;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method OSC|null find($id, $lockMode = null, $lockVersion = null)
 * @method OSC|null findOneBy(array $criteria, array $orderBy = null)
 * @method OSC[]    findAll()
 * @method OSC[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OSCRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, OSC::class);
    }

    // /**
    //  * @return OSC[] Returns an array of OSC objects
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
    public function findOneBySomeField($value): ?OSC
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
