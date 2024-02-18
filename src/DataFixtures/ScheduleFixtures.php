<?php

namespace App\DataFixtures;

use App\Entity\Schedule;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ScheduleFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $schedule = new Schedule();
        $schedule->setDay('Lundi-Vendredi');
        $schedule->setOpeningHour('09h');
        $schedule->setClosingHour('13h');
        $schedule->setOpeningAfternoon('14h');
        $schedule->setClosingAfternoon('19h');
        $manager->persist($schedule);

        $schedule = new Schedule();
        $schedule->setDay('Samedi');
        $schedule->setOpeningHour('09h30');
        $schedule->setClosingHour('12h');
        $schedule->setOpeningAfternoon('14h');
        $schedule->setClosingAfternoon('18h');
        $manager->persist($schedule);

        $manager->flush();
    }
}
