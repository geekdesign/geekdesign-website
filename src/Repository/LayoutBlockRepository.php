<?php

namespace App\Repository;

use App\Entity\LayoutBlock;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method LayoutBlock|null find($id, $lockMode = null, $lockVersion = null)
 * @method LayoutBlock|null findOneBy(array $criteria, array $orderBy = null)
 * @method LayoutBlock[]    findAll()
 * @method LayoutBlock[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LayoutBlockRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LayoutBlock::class);
    }

    // /**
    //  * @return LayoutBlock[] Returns an array of LayoutBlock objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?LayoutBlock
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
