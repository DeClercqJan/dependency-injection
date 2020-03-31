<?php

namespace App\Repository;

use App\Entity\TransformInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method TransformInterface|null find($id, $lockMode = null, $lockVersion = null)
 * @method TransformInterface|null findOneBy(array $criteria, array $orderBy = null)
 * @method TransformInterface[]    findAll()
 * @method TransformInterface[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TransformInterfaceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TransformInterface::class);
    }

    // /**
    //  * @return TransformInterface[] Returns an array of TransformInterface objects
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
    public function findOneBySomeField($value): ?TransformInterface
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
