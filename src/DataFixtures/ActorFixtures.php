<?php

namespace App\DataFixtures;

use App\Entity\Author;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ActorFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {

        // Génere les données pour 10 acteurs avec un firstName et un lastName réaliste

        $firstNames = ['Jean', 'Pierre', 'Paul', 'Jacques', 'Marie', 'Julie', 'Julien', 'Jeanne', 'Pierre', 'Pauline'];
        $lastNames = ['Dupont', 'Durand', 'Duchemin', 'Duchesse', 'Duc', 'Ducroc', 'Ducrocq', 'Ducroq', 'Ducroque', 'Ducroquefort'];

        foreach (range(1, 10) as $i) {
            $actor = new Author();
            $actor->setFirstName($firstNames[rand(0, 9)]);
            $actor->setLastName($lastNames[rand(0, 9)]);
            $actor->setNationalite($this->getReference('nationalite_'.rand(1, 10)));
            $manager->persist($actor);
            $this->addReference('actor_' . $i, $actor); // "expose" l'objet à l'extérieur de la classe pour les liaisons avec Movie
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
