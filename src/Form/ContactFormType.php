<?php

namespace App\Form;

use App\Entity\ContactForm;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstName', TextType::class, [
                'label' => '<i class="bi bi-person"></i> Prénom',
                'label_html' => true,
            ])
            ->add('lastName', TextType::class, [
                'label' => '<i class="bi bi-person"></i> Nom',
                'label_html' => true,
            ])
            ->add('phone', TelType::class, [
                'label' => '<i class="bi bi-telephone"></i> Téléphone',
                'label_html' => true,
            ])
            ->add('email', EmailType::class, [
                'label' => '<i class="bi bi-envelope"></i> Email',
                'label_html' => true,
            ])
            ->add('message', TextareaType::class, [
                'label' => '<i class="bi bi-pen"></i> Message',
                'label_html' => true,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ContactForm::class,
        ]);
    }
}
