<?php

namespace App\Controller;

use App\Entity\Event;
use App\Entity\Picture;
use App\Repository\EventRepository;
use App\Repository\PictureRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/evenement', name: 'event_')]
class EventController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(EventRepository $eventRepository): Response
    {
        $events = $eventRepository->findAll();
        return $this->render('event/index.html.twig', [
            'events' => $events,
            'title' => 'Les Évènements',
        ]);
    }

    #[Route('/{id}', methods: ['GET'], name: 'show')]
    public function show(Event $id, PictureRepository $pictureRepository): Response
    {
        $pictures = $pictureRepository->findBy(['event' => $id]);

        return $this->render('event/show.html.twig', [
            'id' => $id,
            'images' => $pictures,
        ]);
    }
}
