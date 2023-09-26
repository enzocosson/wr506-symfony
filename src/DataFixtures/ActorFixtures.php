<?php

namespace App\DataFixtures;

use App\Entity\Author;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ActorFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        // Génere les données pour 10 acteurs avec un firstName et un lastName réaliste

        $firstNames = ['Jean', 'Pierre', 'Paul', 'Jacques', 'Marie', 'Julie', 'Julien', 'Jeanne', 'Pierre', 'Pauline'];
        $lastNames = ['Dupont', 'Durand', 'Duchemin', 'Duchesse', 'Duc', 'Ducroc', 'Ducrocq', 'Ducroq', 'Ducroque', 'Ducroquefort'];

        foreach (range(1, 10) as $i) {
            $autor = new Author();
            $autor->setFirstName($firstNames[rand(0, 9)]);
            $autor->setLastName($lastNames[rand(0, 9)]);
            $manager->persist($autor);
            $this->addReference('autor_' . $i, $autor); // "expose" l'objet à l'extérieur de la classe pour les liaisons avec Movie
        }

        $manager->flush();
    }
}