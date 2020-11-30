<?php

namespace App\DataFixtures;

use App\Entity\Icon;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class IconFixture extends Fixture
{
    public const LIBELLE_REFERENCE = 'icon_';
    public const NOMBRE_REFERENCE = 10;


    public function load(ObjectManager $manager)
    {
        $icons = ["fas fa-file-download", "fas fa-car", "fas fa-globe", "fas fa-at", "fas fa-linkedin", "fas fa-alt", "fas fa-plus", "fas fa-check", "fas fa-user", "fas fa-brain"];

        for($i = 0 ; $i < $this::NOMBRE_REFERENCE ; $i++) {
            $icon = new Icon();
            $icon->setIcon($icons[$i]);

            $this->addReference($this::LIBELLE_REFERENCE . $i, $icon);

            $manager->persist($icon);
        }

        $manager->flush();

    }
}
