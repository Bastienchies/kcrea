<?php

namespace App\Repository;

use App\Entity\CompoFilmActeur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method CompoFilmActeur|null find($id, $lockMode = null, $lockVersion = null)
 * @method CompoFilmActeur|null findOneBy(array $criteria, array $orderBy = null)
 * @method CompoFilmActeur[]    findAll()
 * @method CompoFilmActeur[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CompoFilmActeurRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, CompoFilmActeur::class);
    }

//    /**
//     * @return CompoFilmActeur[] Returns an array of CompoFilmActeur objects
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
    public function findOneBySomeField($value): ?CompoFilmActeur
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
