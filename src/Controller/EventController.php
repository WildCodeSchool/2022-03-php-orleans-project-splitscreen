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
        $pastEvents = $eventRepository->findAllPastEvents();
        $upcomingEvents = $eventRepository->findAllUpcomingEvents();
        return $this->render('event/index.html.twig', [
            'upcomingEvents' => $upcomingEvents,
            'pastEvents' => $pastEvents,
        ]);
    }

    #[Route('/{id}', methods: ['GET'], name: 'show')]
    public function show(int $id, EventRepository $eventRepository): Response
    {
        $event = $eventRepository->findOneById($id);
        return $this->render('event/show.html.twig', [
            'event' => $event,
            'id' => $id,
        ]);
    }
}
