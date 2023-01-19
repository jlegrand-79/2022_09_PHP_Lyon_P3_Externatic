<?php

namespace App\Repository;

use App\Entity\Offer;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Offer>
 *
 * @method Offer|null find($id, $lockMode = null, $lockVersion = null)
 * @method Offer|null findOneBy(array $criteria, array $orderBy = null)
 * @method Offer[]    findAll()
 * @method Offer[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OfferRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Offer::class);
    }

    public function save(Offer $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Offer $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function findLikeNameAndCity(string $name, string $city): array
    {
        $queryBuilder = $this->createQueryBuilder('o')
            ->where('o.title LIKE :name')
            ->andWhere('o.city LIKE :city')
            ->setParameter('name', '%' . $name . '%')
            ->setParameter('city', '%' . $city . '%')
            ->orderBy('o.title', 'ASC')
            ->getQuery();
        return $queryBuilder->getResult();
    }

    public function findLikeDepartment(string $name, string $city, string $code): array
    {
        $queryBuilder = $this->createQueryBuilder('o')
            ->where('o.title LIKE :name')
            ->andwhere('o.department = :code')
            ->andWhere('o.city != :city')
            ->setParameter('name', '%' . $name . '%')
            ->setParameter('city', $city)
            ->setParameter('code', $code)
            ->orderBy('o.title', 'ASC')
            ->getQuery();
        return $queryBuilder->getResult();
    }

    public function randomOffer(): array
    {
        $queryBuilder = $this->createQueryBuilder('o')
            ->setMaxResults(6)
            ->orderBy('RAND()')
            ->getQuery();
        return $queryBuilder->getResult();
    }

    // public function search(string $search)
    // {
    //     return $this->createQueryBuilder('o')
    //         ->where('o.title LIKE :search')
    //         ->setParameter('search', '%' . $search . '%')
    //         ->getQuery()
    //         ->getResult();
    // }

    //    /**
    //     * @return Offer[] Returns an array of Offer objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('o')
    //            ->andWhere('o.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('o.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Offer
    //    {
    //        return $this->createQueryBuilder('o')
    //            ->andWhere('o.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
