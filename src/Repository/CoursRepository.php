<?php

namespace App\Repository;

use App\Entity\Cours;
use App\Data\SearchData;
use Doctrine\Persistence\ManagerRegistry;
use Knp\Component\Pager\PaginatorInterface;
use Knp\Component\Pager\Pagination\PaginationInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @method Cours|null find($id, $lockMode = null, $lockVersion = null)
 * @method Cours|null findOneBy(array $criteria, array $orderBy = null)
 * @method Cours[]    findAll()
 * @method Cours[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CoursRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry, PaginatorInterface $paginator )
    {
        parent::__construct($registry, Cours::class);
        $this->paginator = $paginator;
    }

    /**
     * Résoudre les cours en lien avec une recherche
     * @return PaginationInterface
     */

    public function findSearch(SearchData $search): PaginationInterface
    {
        $query = $this
         ->createQueryBuilder('p')
         ->select('c','p','d')
         ->join('p.niveauscolaire', 'c')
         ->join('p.ecole', 'd');

         if (!empty($search->q)) {
            $query = $query
                ->andWhere('p.nom LIKE :q')
                ->setParameter('q', "%{$search->q}%");
        }

        if (!empty($search->min)) {
            $query = $query
                ->andWhere('p.prix >= :min')
                ->setParameter('min', $search->min);
        }

        if (!empty($search->max) ) {
            $query = $query
                ->andWhere('p.prix <= :max')
                ->setParameter('max', $search->max);
        }

      

        if (!empty($search->niveauscolaire)) {
            $query = $query
                ->andWhere('c.id IN (:niveauscolaire)')
                ->setParameter('niveauscolaire', $search->niveauscolaire);
        }
        if (!empty($search->ecole)) {
            $query = $query
                ->andWhere('d.id IN (:ecole)')
                ->setParameter('ecole', $search->ecole);
        }

        $query = $query->getQuery();
        return $this->paginator->paginate(
            $query,
            $search->page,
           12
        );
    }

   
}
