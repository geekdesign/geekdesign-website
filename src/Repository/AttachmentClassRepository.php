<?php

namespace App\Repository;

use App\Entity\AttachmentClass;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method AttachmentClass|null find($id, $lockMode = null, $lockVersion = null)
 * @method AttachmentClass|null findOneBy(array $criteria, array $orderBy = null)
 * @method AttachmentClass[]    findAll()
 * @method AttachmentClass[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AttachmentClassRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AttachmentClass::class);
    }

    // /**
    //  * @return AttachmentClass[] Returns an array of AttachmentClass objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?AttachmentClass
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
