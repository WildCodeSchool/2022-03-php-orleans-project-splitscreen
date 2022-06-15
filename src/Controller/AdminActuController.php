<?php

namespace App\Controller;

use App\Entity\Actu;
use App\Form\ActuType;
use App\Repository\ActuRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/actu', name: 'admin_actu_')]
class AdminActuController extends AbstractController
{
    #[Route('/', name: 'index', methods: ['GET'])]
    public function index(ActuRepository $actuRepository): Response
    {
        return $this->render('admin/admin_actu/index.html.twig', [
            'actus' => $actuRepository->findAll(),
        ]);
    }

    #[Route('/ajout', name: 'new', methods: ['GET', 'POST'])]
    public function new(Request $request, ActuRepository $actuRepository): Response
    {
        $actu = new Actu();
        $form = $this->createForm(ActuType::class, $actu);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $actuRepository->add($actu, true);

            return $this->redirectToRoute('admin_actu_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin/admin_actu/new.html.twig', [
            'actu' => $actu,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'show', methods: ['GET'])]
    public function show(Actu $actu): Response
    {
        return $this->render('admin/admin_actu/show.html.twig', [
            'actu' => $actu,
        ]);
    }

    #[Route('/{id}/edit', name: 'edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Actu $actu, ActuRepository $actuRepository): Response
    {
        $form = $this->createForm(ActuType::class, $actu);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $actuRepository->add($actu, true);

            return $this->redirectToRoute('admin_actu_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin/admin_actu/edit.html.twig', [
            'actu' => $actu,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'delete', methods: ['POST'])]
    public function delete(Request $request, Actu $actu, ActuRepository $actuRepository): Response
    {
        if ($this->isCsrfTokenValid('delete' . $actu->getId(), $request->request->get('_token'))) {
            $actuRepository->remove($actu, true);
        }

        return $this->redirectToRoute('admin_actu_index', [], Response::HTTP_SEE_OTHER);
    }
}
