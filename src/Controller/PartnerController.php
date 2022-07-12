<?php

namespace App\Controller;

use App\Entity\Partner;
use App\Form\PartnerType;
use App\Repository\PartnerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('admin/partenaires', name: 'partners_')]
class PartnerController extends AbstractController
{
    #[Route('/', name: 'index', methods: ['GET'])]
    public function index(PartnerRepository $partnersRepository): Response
    {
        return $this->render('admin/partner/index.html.twig', [
            'partners' => $partnersRepository->findAll(),
        ]);
    }

    #[Route('/ajouter', name: 'new', methods: ['GET', 'POST'])]
    public function new(Request $request, PartnerRepository $partnersRepository): Response
    {
        $partner = new Partner();
        $form = $this->createForm(PartnerType::class, $partner, [
            'validation_groups' => ['add']
        ]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $partnersRepository->add($partner, true);
            $this->addFlash('success', 'Partenaire ajouté');
            return $this->redirectToRoute('partners_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin/partner/new.html.twig', [
            'partner' => $partner,
            'form' => $form,
        ]);
    }


    #[Route('/{id}/modifier', name: 'edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Partner $partner, PartnerRepository $partnersRepository): Response
    {
        $form = $this->createForm(PartnerType::class, $partner, [
            'validation_groups' => ['default']
        ]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $partnersRepository->add($partner, true);
            $this->addFlash('success', 'Partenaire modifié');
            return $this->redirectToRoute('partners_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin/partner/edit.html.twig', [
            'partner' => $partner,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'delete', methods: ['POST'])]
    public function delete(Request $request, Partner $partner, PartnerRepository $partnersRepository): Response
    {
        if ($this->isCsrfTokenValid('delete' . $partner->getId(), $request->request->get('_token'))) {
            $partnersRepository->remove($partner, true);
        }
        $this->addFlash('success', 'Partenaire supprimé');
        return $this->redirectToRoute('partners_index', [], Response::HTTP_SEE_OTHER);
    }
}
