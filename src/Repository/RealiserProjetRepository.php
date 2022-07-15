<?php

namespace App\Repository;

use App\Entity\RealiserProjet;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<RealiserProjet>
 *
 * @method RealiserProjet|null find($id, $lockMode = null, $lockVersion = null)
 * @method RealiserProjet|null findOneBy(array $criteria, array $orderBy = null)
 * @method RealiserProjet[]    findAll()
 * @method RealiserProjet[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RealiserProjetRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RealiserProjet::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(RealiserProjet $entity, bool $flush = true): void
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
    public function remove(RealiserProjet $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return RealiserProjet[] Returns an array of RealiserProjet objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?RealiserProjet
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
