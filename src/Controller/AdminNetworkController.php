<?php

namespace App\Controller;

use App\Entity\Network;
use App\Form\NetworkType;
use App\Repository\NetworkRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/network', name: 'admin_network_')]
class AdminNetworkController extends AbstractController
{
    #[Route('/', name: 'index', methods: ['GET'])]
    public function index(NetworkRepository $networkRepository): Response
    {
        return $this->render('admin/admin_network/index.html.twig', [
            'networks' => $networkRepository->findAll(),
        ]);
    }

    #[Route('/{id}/edit', name: 'edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Network $network, NetworkRepository $networkRepository): Response
    {
        $form = $this->createForm(NetworkType::class, $network);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $networkRepository->add($network, true);

            return $this->redirectToRoute('admin_network_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin/admin_network/edit.html.twig', [
            'network' => $network,
            'form' => $form,
        ]);
    }
}
