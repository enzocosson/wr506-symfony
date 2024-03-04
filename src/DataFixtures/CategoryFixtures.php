<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $categoryNames = ['Action', 'Drama', 'Comedy', 'Science Fiction', 'Thriller'];

        // Génère 5 catégories fictives

        foreach ($categoryNames as $i => $categoryName) {
            $category = new Category();
            $category->setName($categoryName);
            $manager->persist($category);
            $this->addReference('category_' . ($i + 1), $category); 
        }

        $manager->flush();
    }
}
