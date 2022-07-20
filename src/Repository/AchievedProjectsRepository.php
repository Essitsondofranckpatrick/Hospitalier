<?php

namespace App\Repository;

use App\Entity\AchievedProjects;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<AchievedProjects>
 *
 * @method AchievedProjects|null find($id, $lockMode = null, $lockVersion = null)
 * @method AchievedProjects|null findOneBy(array $criteria, array $orderBy = null)
 * @method AchievedProjects[]    findAll()
 * @method AchievedProjects[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AchievedProjectsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AchievedProjects::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(AchievedProjects $entity, bool $flush = true): void
    {
        $this->_em->persist($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function remove(AchievedProjects $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return AchievedProjects[] Returns an array of AchievedProjects objects
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
    public function findOneBySomeField($value): ?AchievedProjects
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
