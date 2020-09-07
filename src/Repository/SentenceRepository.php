<?php

namespace App\Repository;

use App\Entity\Sentence;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Sentence|null find($id, $lockMode = null, $lockVersion = null)
 * @method Sentence|null findOneBy(array $criteria, array $orderBy = null)
 * @method Sentence[]    findAll()
 * @method Sentence[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SentenceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Sentence::class);
    }

    /**
     * @param string $link
     * @return Sentence|null
     * @throws \Doctrine\ORM\NoResultException
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function findByLink(string $link): ?Sentence
    {
        return $this->createQueryBuilder('sentence')
            ->andWhere('sentence.link = :link')
            ->setParameter('link', $link)
            ->getQuery()
            ->getOneOrNullResult();
    }
}
