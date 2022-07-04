<?php

namespace App\Controller;

use App\Repository\PartnerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AssociationController extends AbstractController
{
    #[Route('/association', name: 'association_index')]
    public function index(PartnerRepository $partnerRepository): Response
    {
        $partners = $partnerRepository->findby([
        ]);

        return $this->render('association/index.html.twig', [
            'partners' => $partners,
        ]);
    }
}
