<?php

namespace App\Repository;

use App\Entity\TypeUtilisateurGroupe;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method TypeUtilisateurGroupe|null find($id, $lockMode = null, $lockVersion = null)
 * @method TypeUtilisateurGroupe|null findOneBy(array $criteria, array $orderBy = null)
 * @method TypeUtilisateurGroupe[]    findAll()
 * @method TypeUtilisateurGroupe[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypeUtilisateurGroupeRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, TypeUtilisateurGroupe::class);
    }

//    /**
//     * @return TypeUtilisateurGroupe[] Returns an array of TypeUtilisateurGroupe objects
//     */
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
    public function findOneBySomeField($value): ?TypeUtilisateurGroupe
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
