<?php

namespace App\Repository;

use App\Entity\Offer;
use App\Entity\Recruiter;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

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

    public function findLikeNameAndCity(
        string $name,
        string $city,
        ?string $partner = null,
        ?Recruiter $recruiter = null
    ): array {
        $queryBuilder = $this->createQueryBuilder('o')
            ->where('o.title LIKE :name')
            ->andWhere('o.city LIKE :city');

        if (isset($partner)) {
            $queryBuilder
            ->join('o.recruiter', 'r')
            ->join('r.partner', 'p')
            ->andWhere('p.name LIKE :partner')
            ->setParameter('partner', '%' . $partner . '%');
        }

        if (isset($recruiter)) {
            $queryBuilder
            ->andWhere('o.recruiter = :recruiter')
            ->setParameter('recruiter', $recruiter);
        }

        $queryBuilder
            ->setParameter('name', '%' . $name . '%')
            ->setParameter('city', '%' . $city . '%')
            ->orderBy('o.id', 'DESC')
            ->orderBy('o.open', 'DESC')
            ->getQuery();

            return $queryBuilder->getQuery()->getResult();
    }

    public function findLikeDepartment(string $name, string $city, string $code, ?Recruiter $recruiter = null): array
    {
        $queryBuilder = $this->createQueryBuilder('o')
            ->where('o.title LIKE :name')
            ->andwhere('o.postalCode LIKE :code')
            ->andWhere('o.city != :city');

        if (isset($recruiter)) {
            $queryBuilder
            ->andWhere('o.recruiter = :recruiter')
            ->setParameter('recruiter', $recruiter);
        }

        $queryBuilder
            ->setParameter('name', '%' . $name . '%')
            ->setParameter('city', $city)
            ->setParameter('code', $code . '%')
            ->orderBy('o.id', 'DESC')
            ->orderBy('o.open', 'DESC')
            ->getQuery();

            return $queryBuilder->getQuery()->getResult();
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
