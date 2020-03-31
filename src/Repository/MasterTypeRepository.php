<?php

namespace App\Repository;

use App\Entity\MasterType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method MasterType|null find($id, $lockMode = null, $lockVersion = null)
 * @method MasterType|null findOneBy(array $criteria, array $orderBy = null)
 * @method MasterType[]    findAll()
 * @method MasterType[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MasterTypeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MasterType::class);
    }

    // /**
    //  * @return DataType[] Returns an array of DataType objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?DataType
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
