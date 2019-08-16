<?php

namespace App\Repository;

use App\Entity\DocumentosVerificacion;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method DocumentosVerificacion|null find($id, $lockMode = null, $lockVersion = null)
 * @method DocumentosVerificacion|null findOneBy(array $criteria, array $orderBy = null)
 * @method DocumentosVerificacion[]    findAll()
 * @method DocumentosVerificacion[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DocumentosVerificacionRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, DocumentosVerificacion::class);
    }

    // /**
    //  * @return DocumentosVerificacion[] Returns an array of DocumentosVerificacion objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?DocumentosVerificacion
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
