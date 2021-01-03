<?php

namespace App\DataFixtures;

use App\Entity\Quality;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class QualityFixture extends Fixture implements DependentFixtureInterface
{
    public const LIBELLE_REFERENCE = 'quality_';
    public const NOMBRE_REFERENCE = 4;


    public function load(ObjectManager $manager)
    {
        $qualities = [
            ["Investi", "Je donne toujours le meilleur de moi-même."],
            ["Envie d'apprendre", "Je n'hésite jamais à apprendre afin de devenir meilleur."],
            ["Autonome", "Je sais travailler de mon côté lorsqu'il le faut."],
            ["Réfléchi", "Je ne me lance pas tête baissée dans des problèmes."]
        ];

        for ($i = 0; $i < $this::NOMBRE_REFERENCE; $i++) {
            $quality = new Quality();
            $quality->setName($qualities[$i][0])
                    ->setDescription($qualities[$i][1])
                    ->setIcon($this->getReference(IconFixture::LIBELLE_REFERENCE . ($i+6))); // car il y a déjà les icônes des informations

            $this->addReference($this::LIBELLE_REFERENCE . $i, $quality);

            $manager->persist($quality);
        }

        $manager->flush();

    }

    public function getDependencies()
    {
        return [IconFixture::class];
    }
}
