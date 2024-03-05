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
            'The Queen\'s Gambit', 'The Irishman', 'Bird Box', 'Extraction', 'Enola Holmes',
            'Sex Education', 'Elite', 'The Punisher', 'The Stranger', 'The Society',
            'The Dragon Prince', 'Fury', 'The Order', 'The Protector', 'The Spy',
            'Dragon', 'Ready Player One', 'The Innocent', 'The Mist', 'The Politician',
            'The Rain', 'The Sinner'
        ];

        $trailers = [
            'Stranger Things' => 'https://www.youtube.com/embed/vgiVAHcTh9A?si=iWv3Ug---pfXCqPp',
            'The Crown' => 'https://www.youtube.com/embed/wjdCxLXfRPM?si=QRWNA3NRxKEcrGM5',
            'Black Mirror' => 'https://www.youtube.com/embed/d6-HaZ0zK6U?si=cgDIrFMhaxpMOjPn',
            'Narcos' => 'https://www.youtube.com/embed/LNqJnZl4imQ?si=vB2ghtIEIKH_pZ_n',
            'Money Heist' => 'https://www.youtube.com/embed/M4duA2e-YH0?si=UFOJVspc3RoeKn6j',
            'Ozark' => 'https://www.youtube.com/embed/14IGsjDs2tU?si=LRtUB1OywUv7ecnX',
            'Breaking Bad' => 'https://www.youtube.com/embed/CoWsuFdqeYE?si=gl4S2s2mChg9EG0d',
            'Dark' => 'https://www.youtube.com/embed/vx9HQwjTcXI?si=p3TMHT1mgQlH_dHh',
            'The Witcher' => 'https://www.youtube.com/embed/bGFpSNKtLlc?si=PFbkZJvo1H0KXTB7',
            'Mindhunter' => 'https://www.youtube.com/embed/dXhzND7dFHU?si=BVxurzUcV1oi0uh',
            'Lucifer' => 'https://www.youtube.com/embed/vOzt9T2Ji3s?si=A29jLnupu8-uVEM5',
            'House of Cards' => 'https://www.youtube.com/embed/-VF3CTr2_J0?si=WrNQ27M0Xl0adwbl',
            'The Umbrella Academy' => 'https://www.youtube.com/embed/m72aT-pvdiI?si=Nhz4dDAUyUY-0oCw',
            'Peaky Blinders' => 'https://www.youtube.com/embed/QlU-5RsnYTk?si=DTuu6rfLY1uMX1ZZ',
            'La Casa de Papel' => 'https://www.youtube.com/embed/0ULjL4cbSro?si=gGQ5OiU50u7HyQ4C',
            '13 Reasons Why' => 'https://www.youtube.com/embed/LVVMvRpmu0s?si=CnY5MTFA_Yb14q9M',
            'The Haunting of Hill House' => 'https://www.youtube.com/embed/zr6pV2svobI?si=txRvE3OAkskRG-rl',
            'Altered Carbon' => 'https://www.youtube.com/embed/sK54Y2_OMXo?si=9iNeu4uBi3lgU-Dq',
            'The Queen\'s Gambit' => 'https://www.youtube.com/embed/4SB9SBnWeqc?si=rXSfrLnTCVV1OC1p',
            'The Irishman' => 'https://www.youtube.com/embed/L-PFfq10TeE?si=CdZh5--df4q5LTYj',
            'Bird Box' => 'https://www.youtube.com/embed/fxT9Ki5Hk4k?si=oVuxUBX5BO9ApEjt',
            'Extraction' => 'https://www.youtube.com/embed/V95ZyU3QMic?si=9seunPnBVURl2qqt',
            'Enola Holmes' => 'https://www.youtube.com/embed/wnzLTkejrT8?si=fmCQBIHFRtS6vQQY',
            'Sex Education' => 'https://www.youtube.com/embed/UmFMKodOd5M?si=YuFkT6R_Hj0devPC',
            'Elite' => 'https://www.youtube.com/embed/pr8gOKsF6ek?si=-2vYnde7yW-rdrZh',
            'The Punisher' => 'https://www.youtube.com/embed/09Gz82tLmXA?si=DCMf8qY1R5sJvwKp',
            'The Stranger' => 'https://www.youtube.com/embed/YKsPlazmUSo?si=XW9m32s_zRiE4gHf',
            'The Society' => 'https://www.youtube.com/embed/azJQqc9zfKA?si=eQqiM-kIgY7JfZpz',
            'The Dragon Prince' => 'https://www.youtube.com/embed/7Ovc1iqM9AM?si=67I26QYro5VmkiHc',
            'Fury' => 'https://www.youtube.com/embed/PJTkKIxNJAg?si=8kv2jmkwI2PNUlhq',
            'The Order' => 'https://www.youtube.com/embed/-dj3wzVUams?si=55Eyz6eS32QEdunk',
            'The Protector' => 'https://www.youtube.com/embed/BrxAtMlKrps?si=dH793cFYPZIr55CO',
            'The Spy' => 'https://www.youtube.com/embed/SAzGYSOw-FY?si=Ay-IVajGPLFbrT_0',
            'Dragon' => 'https://www.youtube.com/embed/8rR_zgI-cmk?si=wqGrjVzZYqV8IZap',
            'Ready Player One' => 'https://www.youtube.com/embed/oYGkAMHCOC4?si=VKXCCxtSZQqhtG1M',
            'The Innocent' => 'https://www.youtube.com/embed/FLtbBVvbuCA?si=IyK5dCnwu3Xun6BC',
            'The Mist' => 'https://www.youtube.com/embed/Jwvd8CVkGRU?si=kY7034U7oWAMkgLr',
            'The Politician' => 'https://www.youtube.com/embed/2s2L69IrjvE?si=8jWixP1M_zSKztER',
            'The Rain' => 'https://www.youtube.com/embed/5WeaTr4Ib7k?si=3MgcW0SZVJQA5k5P',
            'The Sinner' => 'https://www.youtube.com/embed/FZmRLHpHPUc?si=_a-oInTDUj42b4-l',
        ];

        $movieDescriptions = [
            'Stranger Things' => 'Une série de science-fiction horrifique qui suit un groupe d\'enfants confrontés à des phénomènes surnaturels dans leur petite ville.',
            'The Crown' => 'Une chronique des règnes des monarques britanniques, en mettant particulièrement l\'accent sur le règne actuel de la Reine Elizabeth II.',
            'Black Mirror' => 'Une anthologie de science-fiction explorant les aspects sombres et dystopiques de la technologie moderne et de la société.',
            'Narcos' => 'Basée sur la vie du célèbre trafiquant de drogue Pablo Escobar, cette série dramatique retrace l\'essor et la chute du cartel de Medellín.',
            'Money Heist' => 'Un groupe de criminels planifie et exécute un audacieux braquage de la Monnaie royale espagnole, tout en utilisant des noms de villes comme pseudonymes.',
            'Ozark' => 'Un financier doit déménager sa famille dans les Ozarks pour blanchir de l\'argent et échapper aux représailles d\'un cartel mexicain.',
            'Breaking Bad' => 'Un professeur de chimie atteint d\'un cancer se lance dans le monde dangereux de la fabrication et de la vente de méthamphétamine pour assurer l\'avenir financier de sa famille.',
            'Dark' => 'Une série de science-fiction allemande mêlant voyages dans le temps, mystères familiaux et conspirations dans une petite ville.',
            'The Witcher' => 'Basée sur la série de livres, cette série fantastique suit Geralt de Riv, un chasseur de monstres solitaire, alors qu\'il lutte pour trouver sa place dans un monde où les humains se révèlent souvent plus dangereux que les bêtes.',
            'Mindhunter' => 'Des agents du FBI étudient la psychologie des criminels pour résoudre des affaires criminelles complexes, en se concentrant sur le développement du profilage criminel.',
            'Lucifer' => 'Le Diable s\'ennuie de l\'Enfer et décide de prendre des vacances à Los Angeles, où il dirige une boîte de nuit et aide la police à résoudre des crimes.',
            'House of Cards' => 'Un homme politique sans scrupules, Frank Underwood, utilise la manipulation et la ruse pour gravir les échelons du pouvoir à Washington D.C.',
            'The Umbrella Academy' => 'Des frères et sœurs adoptifs aux pouvoirs extraordinaires se réunissent pour résoudre le mystère de la mort de leur père et empêcher une apocalypse imminente.',
            'Peaky Blinders' => 'Une famille de criminels, les Peaky Blinders, cherche à étendre son influence à Birmingham après la Première Guerre mondiale.',
            'La Casa de Papel' => 'Un groupe de criminels, utilisant des noms de villes comme pseudonymes, planifie et exécute un braquage de la Maison royale de la Monnaie d\'Espagne.',
            '13 Reasons Why' => 'Après le suicide d\'une jeune fille, ses camarades de classe reçoivent des cassettes expliquant les raisons qui ont conduit à sa décision.',
            'The Haunting of Hill House' => 'Une famille traumatisée par des événements surnaturels dans leur enfance est confrontée à des souvenirs troublants alors qu\'ils retournent dans la maison hantée.',
            'Altered Carbon' => 'Dans un futur où la conscience peut être transférée d\'un corps à un autre, un ancien soldat est ramené à la vie pour résoudre un meurtre complexe.',
            'The Queen\'s Gambit' => 'L\'histoire d\'une jeune prodige des échecs, Beth Harmon, qui lutte contre des démons personnels tout en cherchant à devenir la meilleure joueuse d\'échecs au monde.',
            'The Irishman' => 'Un chauffeur de camion impliqué dans le crime organisé réfléchit sur sa vie et son implication dans la disparition mystérieuse d\'un syndicaliste.',
            'Bird Box' => 'Dans un monde post-apocalyptique, une mère et ses enfants doivent traverser un environnement dangereux tout en étant aveuglés pour éviter une menace surnaturelle.',
            'Extraction' => 'Un mercenaire est chargé de sauver le fils d\'un criminel international kidnappé à Dhaka, au Bangladesh.',
            'Enola Holmes' => 'La jeune sœur d\'Sherlock Holmes, Enola, se lance dans une aventure pour retrouver sa mère disparue tout en échappant à ses frères célèbres.',
            'Sex Education' => 'Un adolescent, dont la mère est sexologue, ouvre une clinique de conseils sexuels à l\'école pour aider ses camarades à naviguer dans les complexités de la sexualité.',
            'Elite' => 'Dans une école prestigieuse en Espagne, des élèves issus de milieux différents se retrouvent impliqués dans des mystères, des intrigues et des affaires criminelles.',
            'The Punisher' => 'Après la mort de sa famille, un ancien Marine devient le justicier connu sous le nom de Punisher, cherchant à venger ceux qu\'il a perdus.',
            'The Stranger' => 'La vie d\'un homme bascule lorsque des secrets obscurs sont révélés par une mystérieuse étrangère.',
            'The Society' => 'Les élèves d\'une ville découvrent qu\'ils sont soudainement seuls et doivent créer leur propre société pour survivre.',
            'The Dragon Prince' => 'Deux frères et une elfe entreprennent un voyage périlleux pour empêcher une guerre entre les humains et les elfes en livrant un œuf de dragon au royaume des dragons.',
            'Fury' => 'Pendant la Seconde Guerre mondiale, un équipage de chars américains se bat courageusement derrière les lignes ennemies en Allemagne.',
            'The Order' => 'Un étudiant rejoint une société secrète pour enquêter sur la mystérieuse mort de sa mère, découvrant des forces surnaturelles et des complots magiques.',
            'The Protector' => 'Un jeune homme découvre qu\'il est le dernier descendant d\'une ancienne lignée de protecteurs chargés de sauver Istanbul d\'une menace mystique.',
            'The Spy' => 'Inspirée de faits réels, cette série retrace la vie d\'Eli Cohen, un espion israélien infiltré dans le gouvernement syrien dans les années 1960.',
            'Dragon' => 'Un homme découvre qu\'il a le pouvoir de se transformer en dragon, ce qui le met au centre d\'un conflit ancien et dangereux.',
            'Ready Player One' => 'Dans un futur dystopique, les joueurs utilisent un univers virtuel pour échapper à la réalité, mais une quête épique les attend pour gagner le contrôle de ce monde virtuel.',
            'The Innocent' => 'Après avoir accidentellement causé la mort d\'un homme, un homme ordinaire est entraîné dans un engrenage de conspirations et de mensonges.',
            'The Mist' => 'Une brume mystérieuse enveloppe une petite ville, libérant des créatures mortelles et jetant les habitants dans un combat désespéré pour leur survie.',
            'The Politician' => 'Un lycéen ambitieux, Payton Hobart, aspire à devenir président des États-Unis et navigue à travers des intrigues politiques dans sa quête du pouvoir.',
            'The Rain' => 'Un frère et une sœur survivent dans un monde où une pluie mortelle transporte un virus, forçant les survivants à rechercher un abri tout en luttant pour leur survie.',
            'The Sinner' => 'L\'enquêteur Harry Ambrose explore les mystères derrière des crimes apparemment inexplicables, se plongeant dans la psychologie des criminels.',
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
                ->setDescription($movieDescriptions[$title] ?? 'Aucune description disponible.')
                ->setCategory($this->getReference('category_' . rand(1, 5)))
                ->setTrailer($trailers[$title]);
                $imageName = strtolower(str_replace(' ', '-', $title)) . '.jpeg';
                $movie->setImageName($imageName);
                
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
