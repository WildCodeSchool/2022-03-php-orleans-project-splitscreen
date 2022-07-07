<?php

namespace App\Controller;

use App\Entity\Actuality;
use App\Form\ActualityType;
use App\Repository\ActualityRepository;
use App\Services\Slugify;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('admin/actualite', name: 'admin_actuality_')]
class AdminActualityController extends AbstractController
{
    #[Route('/', name: 'index', methods: ['GET'])]
    public function index(ActualityRepository $actualityRepository): Response
    {
        return $this->render('admin/admin_actuality/index.html.twig', [
            'actualities' => $actualityRepository->findAll(),
        ]);
    }

    #[Route('/ajouter', name: 'new', methods: ['GET', 'POST'])]
    public function new(Request $request, ActualityRepository $actualityRepository, Slugify $slugify): Response
    {
        $actuality = new Actuality();
        $form = $this->createForm(ActualityType::class, $actuality);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $slug = $slugify->generate($actuality->getTitle());
            $actuality->setSlug($slug);
            $actualityRepository->add($actuality, true);
            $this->addFlash('success', 'Nouvelle actualité ajoutée');
            return $this->redirectToRoute('admin_actuality_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin/admin_actuality/new.html.twig', [
            'actuality' => $actuality,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'show', methods: ['GET'])]
    public function show(Actuality $actuality): Response
    {
        return $this->render('admin/admin_actuality/show.html.twig', [
            'actuality' => $actuality,
        ]);
    }

    #[Route('/{id}/modifier', name: 'edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Actuality $actuality, ActualityRepository $actualityRepository): Response
    {
        $form = $this->createForm(ActualityType::class, $actuality);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $actualityRepository->add($actuality, true);
            $this->addFlash('success', 'Actualité modifiée');
            return $this->redirectToRoute('admin_actuality_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin/admin_actuality/edit.html.twig', [
            'actuality' => $actuality,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'delete', methods: ['POST'])]
    public function delete(Request $request, Actuality $actuality, ActualityRepository $actualityRepository): Response
    {
        if ($this->isCsrfTokenValid('delete' . $actuality->getId(), $request->request->get('_token'))) {
            $actualityRepository->remove($actuality, true);
        }
        $this->addFlash('success', 'Actualité supprimée');
        return $this->redirectToRoute('admin_actuality_index', [], Response::HTTP_SEE_OTHER);
    }
}
