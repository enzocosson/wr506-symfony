<?php

namespace App\DataFixtures;

use App\Entity\Movie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use DateTime;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class MovieFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        // Génère 40 films avec un titre, une date de sortie, une durée, un synopsis, une catégorie (en lien avec les autres fixtures) et entre 2 et 4 acteurs, différents (en lien avec les autres fixtures)

        foreach (range(1, 40) as $i) {
            $movie = new Movie();
            $movie->setTitle('Movie ' . $i)
                ->setReleaseDate(new DateTime())
                ->setDuration(rand(60, 180))
                ->setDescription('Synopsis ' . $i)
                ->setPoster("https://picsum.photos/seed/{$i}/300/400")
                ->setPosterPortrait("https://picsum.photos/seed/{$i}/400/300")
                ->setCategory($this->getReference('category_' . rand(1, 5)))
                ->setClassement($i)
                ->setTrailer('https://www.youtube.com/embed/5PSNL1qE6VY');

            // Ajoute entre 2 et 6 acteurs dans le film, tous différents en se basant sur les fixtures
            $actors = [];
            foreach (range(1, rand(2, 6)) as $j) {
                $actor = $this->getReference('actor_' . rand(1, 10));
                if (!in_array($actor, $actors)) {
                    $actors[] = $actor;
                    $movie->addActor($actor);
                }
            }

            $manager->persist($movie);
        }
        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            ActorFixtures::class,
        ];
    }
}
