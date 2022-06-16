<?php

namespace App\Controller;

use App\Repository\ActuRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/actuality', name: 'actuality_')]
class ActualityController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(ActuRepository $actuRepository): Response
    {
        $actus = $actuRepository->findAll();
        return $this->render('actuality/index.html.twig', [
            'actus' => $actus,
        ]);
    }
}
