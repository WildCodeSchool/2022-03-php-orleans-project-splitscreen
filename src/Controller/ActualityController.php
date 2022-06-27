<?php

namespace App\Controller;

use App\Repository\ActualityRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/actualite', name: 'actuality_')]
class ActualityController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(ActualityRepository $actualityRepository): Response
    {
        $actualities = $actualityRepository->findAll();
        return $this->render('actuality/index.html.twig', [
            'actualities' => $actualities,
        ]);
    }

    #[Route('/{id}', methods: ['GET'], name: 'show')]
    public function show(int $id, ActualityRepository $actualityRepository): Response
    {
        $actuality = $actualityRepository->findOneById($id);
        return $this->render('actuality/show.html.twig', [
            'actuality' => $actuality,
            'id' => $id,
        ]);
    }
}
