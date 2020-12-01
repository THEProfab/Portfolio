<?php

namespace App\DataFixtures;

use App\Entity\Background;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class BackgroundFixture extends Fixture implements DependentFixtureInterface
{
    public const LIBELLE_REFERENCE = 'background_';
    public const NOMBRE_REFERENCE = 2;

    public function load(ObjectManager $manager)
    {
        $degrees = [
            ["Baccalauréat Scientifique", "Lycée Robespierre, Arras", "2016", "2019", "Mention Très bien et Mention Européenne Anglais"],
            ["DUT Informatique", "IUT de Lens", "2019", "2021", null]
        ];

        for ($i=0;$i<self::NOMBRE_REFERENCE;$i++){
            $bg = new Background();
            $bg->setDegree($degrees[$i][0])
                ->setSchool($degrees[$i][1])
                ->setBeginning($degrees[$i][2])
                ->setEnd($degrees[$i][3])
                ->setDescription($degrees[$i][4])
                ->setPicture($this->getReference(PictureFixture::LIBELLE_REFERENCE . $i));

            $this->addReference($this::LIBELLE_REFERENCE . $i, $bg);

            $manager->persist($bg);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [PictureFixture::class];
    }
}
