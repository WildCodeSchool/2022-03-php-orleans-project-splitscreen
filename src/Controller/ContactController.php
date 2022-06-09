<?php

namespace App\Controller;

use App\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/contact', name: 'contact_')]
class ContactController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(Request $request, MailerInterface $mailer): Response
    {
        $form = $this->createForm(ContactType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $contactFormData = $form->getData();
            $email = (new Email())
                ->from($contactFormData['email'])
                ->to('test@test.com')
                ->subject('Message Split Screen')
                ->html($this->renderView('contact/_email.html.twig', ['form' => $contactFormData]));
            $mailer->send($email);
            $this->addFlash('success', 'Votre message a bien été envoyé');
            return $this->redirectToRoute('contact_index');
        }

        return $this->render('contact/index.html.twig', [
            'form' => $form->createView(),
            'title' => 'Contact',
        ]);
    }
}