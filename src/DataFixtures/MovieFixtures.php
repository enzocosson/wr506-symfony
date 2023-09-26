<?php

namespace App\DataFixtures;

use App\Entity\Movie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\DataFixtures\ActorFixtures;
use App\DataFixtures\useFixtures;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class MovieFixtures extends Fixture implements DependentFixtureInterface
{
    public function getDependencies(): array
    {
        return [
            ActorFixtures::class,
        ];
    }
    public function load(ObjectManager $manager): void
    {

        foreach (range(1, 40) as $i) {
            $movie = new Movie();
            $movie->setTitle('Movie ' . $i);
            $movie->setReleaseDate(new \DateTime());
            $movie->setDuration(rand(60, 180));
            $movie->setDescription('Synopsis ' . $i);
            $movie->setCategory($this->getReference('category_' . rand(1, 5)));
//            $movie->addautor($this->getReference('autor_' . rand(1, 10)));
//            $movie->addautor($this->getReference('autor_' . rand(1, 10)));
//            $movie->addautor($this->getReference('autor_' . rand(1, 10)));
//            $movie->addautor($this->getReference('autor_' . rand(1, 10)));
            // Ajoute entre 2 et 6 acteurs dans le films, tous différents en se basant sur les fixtures
            $autors = [];
            foreach (range(1, rand(2, 6)) as $j) {
                $autor = $this->getReference('actor_' . rand(1, 10));
                if (!in_array($autor, $autors)) {
                    $autors[] = $autor;
                    $movie->addautor($autor);
                }
            }

            $manager->persist($movie);
        }

        $manager->flush();
    }
  
}