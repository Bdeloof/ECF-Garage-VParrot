<?php

namespace App\DataFixtures;

use App\Entity\Service;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ServiceFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $service = new Service();
        $service->setTitle('Révision générale');
        $service->setDescription('Vidange, pression des pneus, mise à niveau des liquides du véhicules');
        $service->setPrice(265);
        $manager->persist($service);

        $service = new Service();
        $service->setTitle('Révision prémium');
        $service->setDescription('Révision générale, changement des disques et plaquettes de freins, changement des filtres du véhicules');
        $service->setPrice(499);
        $manager->persist($service);

        $service = new Service();
        $service->setTitle('Climatisation');
        $service->setDescription('Contrôle et recharge de la climatisation');
        $service->setPrice(49);
        $manager->persist($service);

        $service = new Service();
        $service->setTitle('Montage pneu');
        $service->setDescription('Changement du pneus et parallelisme (*)');
        $service->setPrice(75);
        $manager->persist($service);

        $manager->flush();

        $manager->flush();
    }
}
