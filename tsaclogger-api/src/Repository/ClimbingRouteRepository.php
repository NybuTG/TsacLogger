<?php

namespace App\Repository;

use App\Entity\ClimbingRoute;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ClimbingRoute>
 *
 * @method ClimbingRoute|null find($id, $lockMode = null, $lockVersion = null)
 * @method ClimbingRoute|null findOneBy(array $criteria, array $orderBy = null)
 * @method ClimbingRoute[]    findAll()
 * @method ClimbingRoute[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ClimbingRouteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ClimbingRoute::class);
    }

    //    /**
    //     * @return ClimbingRoute[] Returns an array of ClimbingRoute objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('c')
    //            ->andWhere('c.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('c.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?ClimbingRoute
    //    {
    //        return $this->createQueryBuilder('c')
    //            ->andWhere('c.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
