<?php

namespace App\Form;

use App\Entity\Announcement;
use App\Entity\Garage;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AnnouncementType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('picture', options:[
                'label' => 'Ajouter une image'
            ])
            ->add('title', options:[
                'label' => 'Titre'
            ])
            ->add('description', options:[
                'label' => 'Description'
            ])
            ->add('technical_info', options:[
                'label' => 'Les informations techniques'
            ])
            ->add('brand', options:[
                'label' => 'La marque'
            ])
            ->add('price', options:[
                'label' => 'Prix'
            ])
            ->add('year', options:[
                'label' => 'Année'
            ])
            ->add('kilometre', options:[
                'label' => 'Kilomètrage'
            ])
            ->add('fuel', options:[
                'label' => 'Carburant'
            ])
            ->add('transmission', options:[
                'label' => 'Boite automatique ou manuel'
            ])
            ->add('user', EntityType::class, [
                'class' => User::class,
'choice_label' => 'name',
'multiple' => true,
'label' => 'Employée'
            ])
            ->add('garage', EntityType::class, [
                'class' => Garage::class,
'choice_label' => 'name',
'label' => 'Garage'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Announcement::class,
        ]);
    }
}
