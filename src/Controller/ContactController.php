<?php

namespace App\Controller;

use App\Entity\Network;
use App\Form\ContactFormType;
use App\Repository\NetworkRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/contact', name: 'contact_')]
class ContactController extends AbstractController
{
    #[Route('/', name: 'index', methods: ['GET', 'POST'])]
    public function index(Request $request, MailerInterface $mailer, NetworkRepository $networkRepository): Response
    {
        $networks = $networkRepository->findAll();
        $form = $this->createForm(ContactFormType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $contactFormData = $form->getData();
            $email = (new Email())
                ->from($contactFormData->getEmail())
                ->to('test@test.com')
                ->subject('Message Split Screen')
                ->html($this->renderView('contact/_email.html.twig', ['form' => $contactFormData]));
            $mailer->send($email);
            $this->addFlash('success', 'Votre message a bien été envoyé');
            return $this->redirectToRoute('contact_index');
        }

        return $this->render('contact/index.html.twig', [
            'form' => $form->createView(),
            'networks' => $networks,
        ]);
    }
}
