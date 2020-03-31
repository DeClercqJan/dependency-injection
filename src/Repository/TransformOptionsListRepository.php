<?php

namespace App\Repository;

use App\Entity\TransformOptions;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method TransformOptions|null find($id, $lockMode = null, $lockVersion = null)
 * @method TransformOptions|null findOneBy(array $criteria, array $orderBy = null)
 * @method TransformOptions[]    findAll()
 * @method TransformOptions[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TransformOptionsListRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TransformOptions::class);
    }

    // /**
    //  * @return TransformOptions[] Returns an array of TransformOptions objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TransformOptions
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
