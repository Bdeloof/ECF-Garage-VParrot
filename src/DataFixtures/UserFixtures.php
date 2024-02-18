<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    public function __construct(
        private UserPasswordHasherInterface $passwordEncoder
    ){}

    public function load(ObjectManager $manager): void
    {
        $admin = new User();
        $admin->setEmail('vincentparrot@garage-vincentparrot.fr');
        $admin->setName('Parrot');
        $admin->setFirstName('Vincent');
        $admin->setPassword(
            $this->passwordEncoder->hashPassword($admin, 'Vincent31ParrotGarage')
        );
        $admin->setRoles(['ROLE_ADMIN']);
        $manager->persist($admin);

        $employee = new User();
        $employee->setEmail('antoinedupont@garage-vincentparrot.fr');
        $employee->setName('Dupont');
        $employee->setFirstName('Antoine');
        $employee->setPassword(
            $this->passwordEncoder->hashPassword($employee, 'Antoine9Dupont')
        );
        $manager->persist($employee);

        $employee = new User();
        $employee->setEmail('kylianmbappe@garage-vincentparrot.fr');
        $employee->setName('Kylian');
        $employee->setFirstName('Mbappé');
        $employee->setPassword(
            $this->passwordEncoder->hashPassword($employee, 'Kylian7Mbappe')
        );
        $manager->persist($employee);

        $employee = new User();
        $employee->setEmail('teddyriner@garage-vincentparrot.fr');
        $employee->setName('Teddy');
        $employee->setFirstName('Rinner');
        $employee->setPassword(
            $this->passwordEncoder->hashPassword($employee, 'Teddy11Riner')
        );
        $manager->persist($employee);

        $manager->flush();
    }
}
