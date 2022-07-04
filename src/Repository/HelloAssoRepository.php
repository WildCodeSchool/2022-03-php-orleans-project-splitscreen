<?php

namespace App\Repository;

use App\Entity\HelloAsso;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<HelloAsso>
 *
 * @method HelloAsso|null find($id, $lockMode = null, $lockVersion = null)
 * @method HelloAsso|null findOneBy(array $criteria, array $orderBy = null)
 * @method HelloAsso[]    findAll()
 * @method HelloAsso[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HelloAssoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, HelloAsso::class);
    }

    public function add(HelloAsso $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(HelloAsso $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }
}
