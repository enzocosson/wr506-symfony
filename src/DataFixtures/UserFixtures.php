<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\User;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{

    public function __construct(
        protected UserPasswordHasherInterface $passwordHasherInterface
    ) {
    }

    public function load(ObjectManager $manager): void
    {
        $user = new User();
        $user->setFirstName('Enzo');
        $user->setLastName('Cosson');
        $user->setEmail('user@mail.com');
        $user->setPassword($this->passwordHasherInterface->hashPassword(
            $user,
            'test'
        ));
        
        // Ajoutez la photo avec l'URL appropriée
        $user->setPhoto('pp1.png');

        $manager->persist($user);
        $manager->flush();
    }
}
