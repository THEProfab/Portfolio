<?php

namespace App\DataFixtures;

use App\Entity\Hobby;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class HobbyFixture extends Fixture implements DependentFixtureInterface
{
    public const LIBELLE_REFERENCE = 'hobby_';
    public const NOMBRE_REFERENCE = 2;

    public function load(ObjectManager $manager)
    {
        $hobbys = [
            ["Jeux vidéo", "J'aime les jeux vidéo car ils permettent de voyager à travers des univers fantastiques et des personnages charismatiques. Je préfère les jeux dits en \"Open world\" car ils laissent une grande liberté d'action aux joueurs."],
            ["Cinéma", "J'aime aller voir des films au cinéma (du moins, avant que la Covid ne nous touche) avec des amis ou de la famille. Je préfère les films d'action et de science-fiction car ils permettent, tout comme les jeux vidéo de vivre des aventures impossibles à vivre dans la réalité."]
        ];

        for ($i=0;$i<self::NOMBRE_REFERENCE;$i++){
            $hobby = new Hobby();
            $hobby->setTitle($hobbys[$i][0]);
            $hobby->setDescription($hobbys[$i][1])
                ->setPicture($this->getReference(PictureFixture::LIBELLE_REFERENCE . ($i+5))); // car il y a déjà les images des backgrounds et experiences

            $this->addReference($this::LIBELLE_REFERENCE . $i, $hobby);

            $manager->persist($hobby);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [PictureFixture::class];
    }
}
