<?php

namespace App\Controller;

use App\Repository\ActualityRepository;
use App\Repository\EventRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home_index')]
    public function index(EventRepository $eventRepository, ActualityRepository $actualityRepository): Response
    {
        $events = $eventRepository->findBy(
            [],
            ['date' => 'DESC'],
            3
        );
        $actus = $actualityRepository->findBy(
            [],
            ['date' => 'DESC'],
            3
        );
        return $this->render('home/index.html.twig', [
            'events' => $events,
            'actus' => $actus,
        ]);
    }
}
