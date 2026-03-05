<?php

namespace App\Controller;

use App\Entity\Book;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class EmpruntController extends AbstractController
{
    #[Route('/emprunt', name: 'app_emprunt')]
    public function index(): Response
    {
        return $this->render('emprunt/index.html.twig', [
            'controller_name' => 'EmpruntController',
        ]);
    }
    #[Route('/emprunt/new/{id}', name: 'app_emprunt_new')]
    public function new(
        Book $book,
        Request $request,
        EntityManagerInterface $entityManagerInterface
    ): Response {
        if ($book->getStock()<0){
            $this->addFlash('danger', 'Livre non disponible');
            
            return $this->redirectToRoute('app_book_index');
        }
        $emprunt =
    }
}