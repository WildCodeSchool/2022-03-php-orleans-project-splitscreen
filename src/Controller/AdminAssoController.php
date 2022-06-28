<?php

namespace App\Controller;

use App\Entity\HelloAsso;
use App\Form\HelloAssoType;
use App\Repository\HelloAssoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/association', name: 'admin_asso_')]
class AdminAssoController extends AbstractController
{
    #[Route('/', name: 'index', methods: ['GET'])]
    public function index(HelloAssoRepository $helloAssoRepository): Response
    {
        return $this->render('admin/admin_asso/index.html.twig', [
            'hello_asso_link' => $helloAssoRepository->findOneBy([]),
        ]);
    }

    #[Route('/{id}/edit', name: 'edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, HelloAsso $helloAsso, HelloAssoRepository $helloAssoRepository): Response
    {
        $form = $this->createForm(HelloAssoType::class, $helloAsso);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $helloAssoRepository->add($helloAsso, true);

            return $this->redirectToRoute('admin_asso_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin/admin_asso/edit.html.twig', [
            'hello_asso_link' => $helloAsso,
            'form' => $form,
        ]);
    }
}
