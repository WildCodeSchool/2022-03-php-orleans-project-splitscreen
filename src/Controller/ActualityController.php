<?php

namespace App\Controller;

use App\Repository\ActualityRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/actualité', name: 'actuality_')]
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
}
