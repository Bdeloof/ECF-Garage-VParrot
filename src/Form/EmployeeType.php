<?php

namespace App\Form;

use App\Entity\Announcement;
use App\Entity\Testimony;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EmployeeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email')
            ->add('roles')
            ->add('password')
            ->add('isVerified')
            ->add('first_name')
            ->add('name')
            ->add('announcements', EntityType::class, [
                'class' => Announcement::class,
'choice_label' => 'id',
'multiple' => true,
            ])
            ->add('testimonies', EntityType::class, [
                'class' => Testimony::class,
'choice_label' => 'id',
'multiple' => true,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
