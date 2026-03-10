<?php

namespace App\Repository;

use App\Entity\Book;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class BookRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Book::class);
    }

    public function countByAuteur(): array
    {
        return $this->createQueryBuilder('book')
            ->select('book.auteur, COUNT(book.id) as total')
            ->groupBy('book.auteur')
            ->getQuery()
            ->getResult();
    }

    public function findBySearch(string $mot): array
    {
        return $this->createQueryBuilder('b')
            ->where('b.titre LIKE :val')
            ->orWhere('b.auteur LIKE :val')
            ->setParameter('val', '%' . $mot . '%')
            ->orderBy('b.titre', 'ASC')
            ->getQuery()
            ->getResult();
    }
}