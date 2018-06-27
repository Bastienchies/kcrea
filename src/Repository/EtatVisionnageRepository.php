<?php

namespace App\Repository;

use App\Entity\EtatVisionnage;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method EtatVisionnage|null find($id, $lockMode = null, $lockVersion = null)
 * @method EtatVisionnage|null findOneBy(array $criteria, array $orderBy = null)
 * @method EtatVisionnage[]    findAll()
 * @method EtatVisionnage[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EtatVisionnageRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, EtatVisionnage::class);
    }

//    /**
//     * @return EtatVisionnage[] Returns an array of EtatVisionnage objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?EtatVisionnage
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
