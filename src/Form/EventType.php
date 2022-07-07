<?php

namespace App\Form;

use App\Entity\Event;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Vich\UploaderBundle\Form\Type\VichImageType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;

class EventType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, [
                'label' => 'Titre',
            ])
            ->add('date', DateType::class, [
                'label' => 'Date',
            ])
            ->add('imageFile', VichImageType::class, [
                'label' => 'Image',
                'allow_delete'  => false,
                'download_link' => false,
            ])
            ->add('description', CKEditorType::class, [
                'label' => 'Description',
            ])
            ->add('catchPhrase', TextType::class, [
                'label' => 'Phrase d\'accroche',
            ])
            ->add('tournamentSlug', TextType::class, [
                'label' => 'Slug du tournoi (optionnel)',
                'required'   => false,
            ])
            ->add('participants', CollectionType::class, [
                'entry_type' => ParticipantType::class,
                'entry_options' => ['label' => false],
                'allow_add' => true,
                'allow_delete' => true,
                'by_reference' => false,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Event::class,
        ]);
    }
}
