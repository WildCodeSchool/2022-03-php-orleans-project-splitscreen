<?php

namespace App\Form;

use App\Entity\Actuality;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Vich\UploaderBundle\Form\Type\VichImageType;

class ActualityType extends AbstractType
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
                'required'   => false,
            ])
            ->add('catchPhrase', TextType::class, [
                'label' => 'Phrase d\'accroche',
            ])
            ->add('description', CKEditorType::class, [
                'label' => 'Description',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Actuality::class,
            'validation_groups' => ['add'],
        ]);
    }
}
