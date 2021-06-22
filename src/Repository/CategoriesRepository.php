<?php

namespace App\Repository;

use App\Entity\Categories;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Categories|null find($id, $lockMode = null, $lockVersion = null)
 * @method Categories|null findOneBy(array $criteria, array $orderBy = null)
 * @method Categories[]    findAll()
 * @method Categories[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CategoriesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Categories::class);
    }

    /**
     * Permet de récupérer les noms des types de logement
     * @return  array
     */

      public function findAllTypes()
      {
          $result = array();
          $entityManager = $this->getEntityManager();
          $query = $entityManager->createQuery('SELECT DISTINCT t.type
              FROM App\Entity\TypeLogement t
              ORDER BY t.type
              ');
          $result = $query->execute();
          return $result;
      }

}