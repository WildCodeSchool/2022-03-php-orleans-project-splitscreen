<?php

namespace App\Controller;

use App\Service\Startggapi;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ApiTestController extends AbstractController
{
    #[Route('/api/test', name: 'app_api_test')]
    public function index(Startggapi $startggapi): Response
    {
        $rankings = $startggapi->fetchResultTournament(
            'tournament/split-screen-joystick-cup-1/event/joystick-cup-1-smash-bros-ultimate'
        );

        return $this->render('api_test/index.html.twig', [
            'rankings' => $rankings,
        ]);
    }
}
