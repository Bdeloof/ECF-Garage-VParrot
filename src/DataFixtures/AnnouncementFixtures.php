<?php

namespace App\DataFixtures;

use App\Entity\Announcement;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AnnouncementFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $announcement = new Announcement();
        $announcement->setPicture("{{ asset('images/annonces/bmw-x1.jpg') }}");
        $announcement->setTitle('BMW X1');
        $announcement->setDescription('BMW X1 année 2020 de couleur grise, peu de frais à apporter, conduite agréable');
        $announcement->setTechicalInfo('faible consommation sur autoroute, toutes options');
        $announcement->setBrand('BMW');
        $announcement->setPrice(22990);
        $announcement->setYear(2020);
        $announcement->setKilometre(72000);
        $announcement->setFuel('Diesel');
        $announcement->setTransmission('Automatique');
        $manager->persist($announcement);

        $announcement = new Announcement();
        $announcement->setPicture("{{ asset('images/annonces/citroen-c3aircross.jpg') }}");
        $announcement->setTitle('Citroen C3 AirCross');
        $announcement->setDescription('Citroen C3 AirCross année 2021 de couleur marron clair, peu de frais à apporter, conduite agréable');
        $announcement->setTechicalInfo('faible consommation en ville');
        $announcement->setBrand('Citroen');
        $announcement->setPrice(15900);
        $announcement->setYear(2021);
        $announcement->setKilometre(42000);
        $announcement->setFuel('Essence');
        $announcement->setTransmission('Manuel');
        $manager->persist($announcement);

        $announcement = new Announcement();
        $announcement->setPicture("{{ asset('images/annonces/hyundai-i20.jpg') }}");
        $announcement->setTitle('Hyundai i20');
        $announcement->setDescription('Hyundai i20 année 2023 de couleur grise, petit choc à l\'avant droit');
        $announcement->setTechicalInfo('Conduite agréable, idéal pour la circulation en ville');
        $announcement->setBrand('Hyundai');
        $announcement->setPrice(19900);
        $announcement->setYear(2023);
        $announcement->setKilometre(15000);
        $announcement->setFuel('Essence');
        $announcement->setTransmission('Manuel');
        $manager->persist($announcement);

        $announcement = new Announcement();
        $announcement->setPicture("{{ asset('images/annonces/mercedes-classea.jpg') }}");
        $announcement->setTitle('Mercedes Classe A');
        $announcement->setDescription('Mercedes Classe A année 2023 de couleur jaune, aussi bien agréable en ville que sur autoroute. Conduite légèrement sportive');
        $announcement->setTechicalInfo('Consommation importante en ville');
        $announcement->setBrand('Mercedes');
        $announcement->setPrice(26900);
        $announcement->setYear(2023);
        $announcement->setKilometre(18000);
        $announcement->setFuel('Diesel');
        $announcement->setTransmission('Automatique');
        $manager->persist($announcement);

        $announcement = new Announcement();
        $announcement->setPicture("{{ asset('images/annonces/mini-coopers.jpg') }}");
        $announcement->setTitle('Mini Cooper S');
        $announcement->setDescription('Mini Cooper S année 2018 de couleur bleu marine, idéale pour se garer partout en ville');
        $announcement->setTechicalInfo('idéal pour la conduite en ville avec sa boite automatique');
        $announcement->setBrand('Mini');
        $announcement->setPrice(21900);
        $announcement->setYear(2018);
        $announcement->setKilometre(22000);
        $announcement->setFuel('Essence');
        $announcement->setTransmission('Automatique');
        $manager->persist($announcement);

        $announcement = new Announcement();
        $announcement->setPicture("{{ asset('images/annonces/peugeot-208.jpg') }}");
        $announcement->setTitle('Peugeot 208');
        $announcement->setDescription('Peugeot 208 année 2022 de couleur noire, une vrai petite citadine');
        $announcement->setTechicalInfo('Petite taille, idéal pour se stationner en centre ville');
        $announcement->setBrand('Peugeot');
        $announcement->setPrice(23900);
        $announcement->setYear(2022);
        $announcement->setKilometre(11000);
        $announcement->setFuel('Essence');
        $announcement->setTransmission('Manuel');
        $manager->persist($announcement);

        $announcement = new Announcement();
        $announcement->setPicture("{{ asset('images/annonces/renault-clio.jpg') }}");
        $announcement->setTitle('Renault Clio');
        $announcement->setDescription('Renault Clio année 2016 de couleur rouge');
        $announcement->setTechicalInfo('Voiture plus toute jeune, quelques frais à venir sur le moteur et l\'embrayage');
        $announcement->setBrand('Renault');
        $announcement->setPrice(11900);
        $announcement->setYear(2016);
        $announcement->setKilometre(110000);
        $announcement->setFuel('Essence');
        $announcement->setTransmission('Manuel');
        $manager->persist($announcement);

        $announcement = new Announcement();
        $announcement->setPicture("{{ asset('images/annonces/skoda-fabia.jpg') }}");
        $announcement->setTitle('Skoda Fabia');
        $announcement->setDescription('Skoda Fabia année 2020 de couleur orange, voiture très prisée des personnes qui font beaucoup de routes dans la journée');
        $announcement->setTechicalInfo('Carrosserie intacte, Careplay, GPS intégré');
        $announcement->setBrand('Skoda');
        $announcement->setPrice(16900);
        $announcement->setYear(2020);
        $announcement->setKilometre(21000);
        $announcement->setFuel('Essence');
        $announcement->setTransmission('Manuel');
        $manager->persist($announcement);

        $announcement = new Announcement();
        $announcement->setPicture("{{ asset('images/annonces/wolksvagen-polo.jpg') }}");
        $announcement->setTitle('Wolksvagen Polo');
        $announcement->setDescription('Wolksvagen Polo année 2019 de couleur blanche, vrai petite citadine très agréable en première main');
        $announcement->setTechicalInfo('légère rayures sur le parechoc arrière, GPS intégré');
        $announcement->setBrand('Wolksvagen');
        $announcement->setPrice(18900);
        $announcement->setYear(2019);
        $announcement->setKilometre(65000);
        $announcement->setFuel('Essence');
        $announcement->setTransmission('Manuel');
        $manager->persist($announcement);

        $manager->flush();
    }
}
