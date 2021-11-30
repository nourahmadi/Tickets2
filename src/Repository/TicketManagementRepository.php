<?php

namespace App\Repository;

use App\Entity\TicketManagement;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TicketManagement|null find($id, $lockMode = null, $lockVersion = null)
 * @method TicketManagement|null findOneBy(array $criteria, array $orderBy = null)
 * @method TicketManagement[]    findAll()
 * @method TicketManagement[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TicketManagementRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TicketManagement::class);
    }

    // /**
    //  * @return TicketManagement[] Returns an array of TicketManagement objects
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
    public function findOneBySomeField($value): ?TicketManagement
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
