<?php

namespace App\Controller;

use App\Repository\HelloAssoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    public function banner(HelloAssoRepository $helloAssoRepository): Response
    {
        $link = $helloAssoRepository->findOneBy([]);
        $link = $link->getLink();

        return $this->render('components/_banner.html.twig', [
            'link' => $link
        ]);
    }
}
