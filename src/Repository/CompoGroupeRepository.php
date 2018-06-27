<?php

namespace App\Repository;

use App\Entity\CompoGroupe;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method CompoGroupe|null find($id, $lockMode = null, $lockVersion = null)
 * @method CompoGroupe|null findOneBy(array $criteria, array $orderBy = null)
 * @method CompoGroupe[]    findAll()
 * @method CompoGroupe[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CompoGroupeRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, CompoGroupe::class);
    }

//    /**
//     * @return CompoGroupe[] Returns an array of CompoGroupe objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CompoGroupe
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
