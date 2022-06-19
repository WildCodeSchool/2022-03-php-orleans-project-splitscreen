<?php

namespace App\Controller;

use App\Entity\Member;
use App\Form\MemberType;
use App\Repository\MemberRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/membres', name: 'admin_member_')]
class AdminMemberController extends AbstractController
{
    #[Route('/', name: 'index', methods: ['GET'])]
    public function index(MemberRepository $memberRepository): Response
    {
        return $this->render('admin/admin_member/index.html.twig', [
            'members' => $memberRepository->findAll(),
        ]);
    }

    #[Route('/ajouter', name: 'add', methods: ['GET', 'POST'])]
    public function new(Request $request, MemberRepository $memberRepository): Response
    {
        $member = new Member();
        $form = $this->createForm(MemberType::class, $member);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $memberRepository->add($member, true);

            return $this->redirectToRoute('admin_member_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin/admin_member/new.html.twig', [
            'member' => $member,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'show', methods: ['GET'])]
    public function show(Member $member): Response
    {
        return $this->render('admin/admin_member/show.html.twig', [
            'member' => $member,
        ]);
    }

    #[Route('/{id}/modifier', name: 'edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Member $member, MemberRepository $memberRepository): Response
    {
        $form = $this->createForm(MemberType::class, $member);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $memberRepository->add($member, true);

            return $this->redirectToRoute('admin_member_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin/admin_member/edit.html.twig', [
            'member' => $member,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'delete', methods: ['POST'])]
    public function delete(Request $request, Member $member, MemberRepository $memberRepository): Response
    {
        if ($this->isCsrfTokenValid('delete' . $member->getId(), $request->request->get('_token'))) {
            $memberRepository->remove($member, true);
        }

        return $this->redirectToRoute('admin_member_index', [], Response::HTTP_SEE_OTHER);
    }
}
