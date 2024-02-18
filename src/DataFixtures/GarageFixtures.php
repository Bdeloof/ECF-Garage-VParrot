<?php

namespace App\DataFixtures;

use App\Entity\Garage;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class GarageFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $garage = new Garage();
        $garage->setName('Garage Vincent Parrot');
        $garage->setAddress('1 rue du Stadium');
        $garage->setPostalCode(31500);
        $garage->setCity('Toulouse');
        $garage->setPhoneNumber('0123456789');
        $manager->persist($garage);

        $manager->flush();
    }
}
