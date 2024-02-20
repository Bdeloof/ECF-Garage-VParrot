<?php

namespace App\Form;

use App\Entity\Garage;
use App\Entity\Schedule;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ScheduleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('day', options:[
                'label' => "Jour"
            ])
            ->add('opening_hour', options:[
                'label' => "Ouverture le matin"
            ])
            ->add('closing_hour', options:[
                'label' => "Fermeture le midi"
            ])
            ->add('opening_afternoon', options:[
                'label' => "Ouverture le midi"
            ])
            ->add('closing_afternoon', options:[
                'label' => "Fermeture le soir"
            ])
            ->add('user', EntityType::class, [
                'class' => User::class,
'choice_label' => 'name',
'label' => "Nom"
            ])
            ->add('garage', EntityType::class, [
                'class' => Garage::class,
'choice_label' => 'name',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Schedule::class,
        ]);
    }
}
