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
            ->add('picture')
            ->add('title')
            ->add('description')
            ->add('technical_info')
            ->add('brand')
            ->add('price')
            ->add('year')
            ->add('kilometre')
            ->add('fuel')
            ->add('transmission')
            ->add('user', EntityType::class, [
                'class' => User::class,
'choice_label' => 'id',
'multiple' => true,
            ])
            ->add('garage', EntityType::class, [
                'class' => Garage::class,
'choice_label' => 'id',
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
