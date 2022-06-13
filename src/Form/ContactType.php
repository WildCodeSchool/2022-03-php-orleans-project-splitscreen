<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {

        $builder
            ->add('firstName', TextType::class, [
                'label' => 'Prénom',
            ])
            ->add('lastName', TextType::class, [
                'label' => 'Nom',
            ])
            ->add('phone', TelType::class, [
                'label' => 'Téléphone'
            ])
            ->add('email', EmailType::class, [
                'label' => 'Email'
            ])
            ->add('message', TextareaType::class, [
                'attr' => ['rows' => 5],
            ])
            ->add('sent', SubmitType::class, [
                'label' => 'Envoyer'
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        // $resolver->setDefaults([
        //     'data_class'      => ContactType::class,
        //     // enable/disable CSRF protection for this form
        //     'csrf_protection' => true,
        //     // the name of the hidden HTML field that stores the token
        //     'csrf_field_name' => '_token',
        //     // an arbitrary string used to generate the value of the token
        //     // using a different string for each form improves its security
        //     'csrf_token_id'   => 'contact_item',
        // ]);
    }
}
