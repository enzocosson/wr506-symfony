<?php

namespace App\DataFixtures;

use App\Entity\Actor;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ActorFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        // Génère les données pour 10 acteurs avec des noms de personnes connues

        $actorsData = [
            ['Tom', 'Hanks'],
            ['Brad', 'Pitt'],
            ['Johnny', 'Depp'],
            ['Leonardo', 'DiCaprio'],
            ['Meryl', 'Streep'],
            ['Scarlett', 'Johansson'],
            ['Denzel', 'Washington'],
            ['Cate', 'Blanchett'],
            ['Will', 'Smith'],
            ['Natalie', 'Portman'],
            ['Joaquin', 'Phoenix'],
            ['Charlize', 'Theron'],
            ['Nicole', 'Kidman'],
            ['Julia', 'Roberts'],
            ['Robert', 'De Niro'],
            ['Angelina', 'Jolie'],
            ['Morgan', 'Freeman'],
            ['Kate', 'Winslet'],
            ['Harrison', 'Ford'],
            ['Diane', 'Keaton'],
            ['Dustin', 'Hoffman'],
            ['Emma', 'Stone'],
            ['Samuel', 'L. Jackson'],
            ['Julianne', 'Moore'],
            ['George', 'Clooney'],
            ['Halle', 'Berry'],
            ['Matthew', 'McConaughey'],
            ['Viola', 'Davis'],
            ['Eddie', 'Murphy'],
            ['Jennifer', 'Lawrence'],
            ['Al', 'Pacino'],
            ['Cameron', 'Diaz'],
            ['Daniel', 'Day-Lewis'],
            ['Sandra', 'Bullock'],
            ['Kevin', 'Costner'],
            ['Anne', 'Hathaway'],
            ['Liam', 'Neeson'],
            ['Reese', 'Witherspoon'],
            ['John', 'Travolta'],
            ['Gwyneth', 'Paltrow'],
            ['Bruce', 'Willis'],
            ['Uma', 'Thurman'],
            ['Keanu', 'Reeves'],
            ['Michelle', 'Pfeiffer'],
            ['Antonio', 'Banderas'],
            ['Sharon', 'Stone'],
            ['Chris', 'Hemsworth'],
            ['Salma', 'Hayek'],
            ['Tommy', 'Lee Jones'],
            ['Catherine', 'Zeta-Jones'],
            ['Chris', 'Evans'],
            ['Penélope', 'Cruz'],
            ['Mark', 'Wahlberg'],
            ['Monica', 'Bellucci'],
            ['Chris', 'Pratt'],
            ['Sophia', 'Loren'],
            ['Chris', 'Pine'],
            ['Audrey', 'Tautou'],
            ['Chris', 'Rock'],
            ['Marion', 'Cotillard'],
 
        ];

        foreach ($actorsData as $i => [$firstName, $lastName]) {
            $actor = new Actor();
            $actor->setFirstName($firstName);
            $actor->setLastName($lastName);
            $actor->setNationalite($this->getReference('nationalite_' . rand(1, 10))); // Assurez-vous d'avoir les références correctes pour la nationalité
            $photoUrl = "https://source.unsplash.com/300x400/?{$firstName}-{$lastName}"; // Utilisez le prénom et le nom pour obtenir une image unique
            $actor->setPhoto($photoUrl);

            $manager->persist($actor);
            $this->addReference('actor_' . ($i + 1), $actor); // "expose" l'objet à l'extérieur de la classe pour les liaisons avec Movie
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            NationaliteFixtures::class,
        ];
    }
}
