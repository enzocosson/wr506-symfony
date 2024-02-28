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
        $movieTitles = [
            'Stranger Things', 'The Crown', 'Black Mirror', 'Narcos', 'Money Heist',
            'Ozark', 'Breaking Bad', 'Dark', 'The Witcher', 'Mindhunter',
            'Lucifer', 'House of Cards', 'The Umbrella Academy', 'Peaky Blinders',
            'La Casa de Papel', '13 Reasons Why', 'The Haunting of Hill House', 'Altered Carbon',
            'The Queen\'s Gambit', 'The Irishman', 'Bird Box', 'Extraction', 'Enola Holmes'
        ];

        // Génère 40 films avec un titre, une date de sortie, une durée, un synopsis, une catégorie (en lien avec les autres fixtures) et entre 2 et 4 acteurs, différents (en lien avec les autres fixtures)

        $totalTitles = count($movieTitles);

        foreach (range(1, 40) as $i) {
            $movie = new Movie();
            
            // Utiliser l'opérateur modulo pour s'assurer que l'index est valide
            $titleIndex = ($i - 1) % $totalTitles;
            $title = $movieTitles[$titleIndex] ?? 'Untitled Movie';

            $movie->setTitle($title)
                ->setReleaseDate(new DateTime())
                ->setDuration(rand(60, 180))
                ->setDescription('Synopsis for ' . $title)
                ->setPoster("https://source.unsplash.com/300x400/?netflix,{$title}") // Utiliser le titre pour obtenir une image unique
                ->setPosterPortrait("https://source.unsplash.com/400x300/?netflix,{$title}") // Utiliser le titre pour obtenir une image unique
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
