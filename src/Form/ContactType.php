<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', options:[
                'label' => 'Votre nom'
            ])
            ->add('phone_number', options:[
                'label' => 'Votre numéro de téléphone'
            ])
            ->add('email', options:[
                'label' => 'Votre adresse email'
            ])
            ->add('question', options:[
                'label' => 'Quel est votre question ?'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
