<?php

namespace App\Controller;

use App\Entity\Network;
use App\Form\NetworkType;
use App\Repository\NetworkRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/network')]
class AdminNetworkController extends AbstractController
{
    #[Route('/', name: 'app_admin_network_index', methods: ['GET'])]
    public function index(NetworkRepository $networkRepository): Response
    {
        return $this->render('admin_network/index.html.twig', [
            'networks' => $networkRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_admin_network_new', methods: ['GET', 'POST'])]
    public function new(Request $request, NetworkRepository $networkRepository): Response
    {
        $network = new Network();
        $form = $this->createForm(NetworkType::class, $network);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $networkRepository->add($network, true);

            return $this->redirectToRoute('app_admin_network_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_network/new.html.twig', [
            'network' => $network,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_network_show', methods: ['GET'])]
    public function show(Network $network): Response
    {
        return $this->render('admin_network/show.html.twig', [
            'network' => $network,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_admin_network_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Network $network, NetworkRepository $networkRepository): Response
    {
        $form = $this->createForm(NetworkType::class, $network);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $networkRepository->add($network, true);

            return $this->redirectToRoute('app_admin_network_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_network/edit.html.twig', [
            'network' => $network,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_network_delete', methods: ['POST'])]
    public function delete(Request $request, Network $network, NetworkRepository $networkRepository): Response
    {
        if ($this->isCsrfTokenValid('delete' . $network->getId(), $request->request->get('_token'))) {
            $networkRepository->remove($network, true);
        }

        return $this->redirectToRoute('app_admin_network_index', [], Response::HTTP_SEE_OTHER);
    }
}
