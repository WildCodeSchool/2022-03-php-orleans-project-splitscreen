<?php

namespace App\Repository;

use App\Entity\Event;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use DateTime;

/**
 * @extends ServiceEntityRepository<Event>
 *
 * @method Event|null find($id, $lockMode = null, $lockVersion = null)
 * @method Event|null findOneBy(array $criteria, array $orderBy = null)
 * @method Event[]    findAll()
 * @method Event[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EventRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Event::class);
    }

    public function add(Event $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Event $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function findAllPastEvents(): array|false
    {
        return $this->createQueryBuilder('e')
            ->Where('e.date < :now')
            ->setParameter('now', new DateTime())
            ->OrderBy('e.date', 'ASC')
            ->getQuery()
            ->getResult();
    }

    public function findAllUpcomingEvents(): array|false
    {
        return $this->createQueryBuilder('e')
            ->Where('e.date > :now')
            ->setParameter('now', new DateTime())
            ->OrderBy('e.date', 'ASC')
            ->getQuery()
            ->getResult();
    }
}
