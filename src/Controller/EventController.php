<?php

namespace App\Controller;

use App\Entity\Event;
use App\Repository\EventRepository;
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
    public function show(int $id, Event $event): Response
    {
        $title = $event->getTitle();
        $image = $event->getImage();
        $description = $event->getDescription();
        $date = $event->getDate();
        return $this->render('event/show.html.twig', [
            'id' => $id,
            'title' => $title,
            'image' => $image,
            'description' => $description,
            'date' => $date,

        ]);
    }
}
