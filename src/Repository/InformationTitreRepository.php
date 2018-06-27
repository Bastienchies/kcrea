<?php

namespace App\Repository;

use App\Entity\InformationTitre;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method InformationTitre|null find($id, $lockMode = null, $lockVersion = null)
 * @method InformationTitre|null findOneBy(array $criteria, array $orderBy = null)
 * @method InformationTitre[]    findAll()
 * @method InformationTitre[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InformationTitreRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, InformationTitre::class);
    }

//    /**
//     * @return InformationTitre[] Returns an array of InformationTitre objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?InformationTitre
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
