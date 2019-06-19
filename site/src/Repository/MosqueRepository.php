<?php

namespace App\Repository;

use App\Entity\Mosque;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Mosque|null find($id, $lockMode = null, $lockVersion = null)
 * @method Mosque|null findOneBy(array $criteria, array $orderBy = null)
 * @method Mosque[]    findAll()
 * @method Mosque[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MosqueRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Mosque::class);
    }

    // /**
    //  * @return Mosque[] Returns an array of Mosque objects
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
    public function findOneBySomeField($value): ?Mosque
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
