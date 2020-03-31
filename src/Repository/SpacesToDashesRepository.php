<?php

namespace App\Repository;

use App\Entity\SpacesToDashes;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method SpacesToDashes|null find($id, $lockMode = null, $lockVersion = null)
 * @method SpacesToDashes|null findOneBy(array $criteria, array $orderBy = null)
 * @method SpacesToDashes[]    findAll()
 * @method SpacesToDashes[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SpacesToDashesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SpacesToDashes::class);
    }

    // /**
    //  * @return SpacesToDashes[] Returns an array of SpacesToDashes objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?SpacesToDashes
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
