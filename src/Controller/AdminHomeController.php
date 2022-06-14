<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminHomeController extends AbstractController
{
    #[Route('/admin/accueil', name: 'admin_home')]
    public function index(): Response
    {
        return $this->render('admin/admin_home/index.html.twig', []);
    }
}
