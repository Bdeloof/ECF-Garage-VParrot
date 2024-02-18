<?php

namespace App\DataFixtures;

use App\Entity\Testimony;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class TestimoniesFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $testimony = new Testimony();
        $testimony->setName('Anne Dupont');
        $testimony->setComment('Garage très professionnel qui tient au courant de l\'avancée des réparations.');
        $testimony->setNote(5);
        $manager->persist($testimony);

        $testimony = new Testimony();
        $testimony->setName('Gérard Clerc');
        $testimony->setComment('Légère déception parce que j\'ai attendu longtemps pour qu\'il répare la carrosserie de ma voiture.');
        $testimony->setNote(3);
        $manager->persist($testimony);

        $testimony = new Testimony();
        $testimony->setName('Joseph Jacques');
        $testimony->setComment('A consulter quand vous êtes en recherche de voiture. Les véhicules proposés sont très bien entretenu. Aucun problème avec la voiture acheté chez eux.');
        $testimony->setNote(4);
        $manager->persist($testimony);

        $manager->flush();
    }
}
