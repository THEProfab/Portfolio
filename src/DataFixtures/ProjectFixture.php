<?php

namespace App\DataFixtures;

use App\Entity\Project;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ProjectFixture extends Fixture implements DependentFixtureInterface
{
    public const LIBELLE_REFERENCE = 'project_';
    public const NOMBRE_REFERENCE = 5;

    public function load(ObjectManager $manager)
    {
        $projects = [
            ["Simulateur de balles chargées électriquement", "Il s'agit d'un simulateur de balles chargées électriquement réalisé en HTML/CSS/JS avec Elliot Caron. Ceci est notre projet de terminale en Informatique et sciences du numérique. Les balles apparaissent en cliquant dans la zone prévue à cet effet. Celles-ci rebondissent sur les bords en se chargeant électriquement : les balles de charges de signes opposés s'attirent tandis que celles de mêmes signes se repoussent. Les balles se répartissent également leurs charges lorsqu'elles entrent en collision. De plus, elles changent de couleur selon leur charge. La vitesse des balles peut aussi être modifiée et des obstacles n'influant pas sur les charges de balles peuvent également être placés.", "Janvier 2019", "Juin 2019", "https://github.com/THEProfab/Projet-ISN"],
            ["Refonte graphique de la page du site de l'IUT de Lens sur les semestres de DUT à l'étranger", "Il s'agit d'un site internet réalisé en HTML/CSS dans le cadre du projet de fin de premier semestre du DUT. J'ai réalisé ce projet avec Elliot Caron. Nous avons respecté la charte graphique de l'IUT et utilisé le framework Bootstrap afin de rendre le site plus responsive.", "Décembre 2019", "Janvier 2020", "https://github.com/THEProfab/ProjetS1"],
            ["Zoom", "Zoom est un jeu en 3D réalisé en C# sous Unity inspiré du jeu vidéo Portal. Dans ce dernier, le joueur possède un pistolet capable de faire apparaître des portails bleus et oranges. Le joueur peut ainsi passer d'un portail bleu à un portail orange ou inversement afin de résoudre les énigmes des salles qui lui sont proposées. Le joueur peut également se servir de cubes pour activer certains boutons et doit également faire attention aux tourelles qui essaient de le tuer. Je me suis, pour ma part, occupé de coder les tourelles ainsi que le système de vie du joueur et de réaliser une grande partie de la salle du niveau.", "Avril 2020", "Juin 2020", null],
            ["GameBoost", "GameBoost est un site internet réalisé en 36 heures et représentant une ludothèque. Sur ce site, une liste de jeux est disponible pour les utilisateurs connectés ou non. Pour chaque jeu, des détails sont disponibles ainsi que les règles de celui-ci et des commentaires. Seul un utilisateur connecté peut ajouter un jeu ou un commentaire. De plus, l'utilisateur connecté a accès à une page de profil pour ajouter des jeux à sa collection. D'autres fonctionnalités sont disponibles comme un tri par ordre alphabétique ou des filtres. Ce projet a été réalisé en PHP avec le framework Laravel pour le back-end, ainsi qu'en HTML/CSS avec le framework Bootstrap pour le front-end. J'ai réalisé ce projet avec Romain DIEU, Thomas BLONDEL, Julien DEGARDIN et Elliot CARON.", "16 Décembre", "17 Décembre 2020", "https://github.com/THEProfab/GameBoost/tree/master"],
            ["Site web personnel", "Il s'agit du site sur lequel vous vous trouvez en ce moment. J'ai réalisé ce projet en PHP avec le framework Symfony et HTML/CSS avec le framework Bootstrap. C'est un site où je me présente en détail ainsi que mes projets et mes compétences.", "Novembre 2020", "Janvier 2021", "https://github.com/THEProfab/Portfolio"]
        ];

        for ($i=0;$i<self::NOMBRE_REFERENCE;$i++){
            $p = new Project();
            $p->setTitle($projects[$i][0])
                ->setDescription($projects[$i][1])
                ->setBeginning($projects[$i][2])
                ->setEnd($projects[$i][3])
                ->setLink($projects[$i][4])
                ->setPicture($this->getReference(PictureFixture::LIBELLE_REFERENCE . ($i+7))); // car il y a déjà les images des backgrounds, experiences et hobbies

            $this->addReference(self::LIBELLE_REFERENCE . $i, $p);

            $manager->persist($p);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [PictureFixture::class];
    }
}
