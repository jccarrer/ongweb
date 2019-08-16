<?php

namespace App\Repository;

use App\Entity\Beneficiarios;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Beneficiarios|null find($id, $lockMode = null, $lockVersion = null)
 * @method Beneficiarios|null findOneBy(array $criteria, array $orderBy = null)
 * @method Beneficiarios[]    findAll()
 * @method Beneficiarios[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BeneficiariosRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Beneficiarios::class);
    }

    // /**
    //  * @return Beneficiarios[] Returns an array of Beneficiarios objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Beneficiarios
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
