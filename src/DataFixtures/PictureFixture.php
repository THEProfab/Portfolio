<?php

namespace App\DataFixtures;

use App\Entity\Picture;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class PictureFixture extends Fixture
{
    public const LIBELLE_REFERENCE = 'picture_';
    public const NOMBRE_REFERENCE = 12;

    public function load(ObjectManager $manager)
    {
        $pics = ["robespierre.jpg", "iut.jpg", "bnp1.jpg", "bnp2.svg", "logo_iut.png", "aco.jpg", "cinema.jpg", "isn.png", "projet_s1.png", "zoom.png", "gameboost.png", "portfolio.png"];

        for($i=0;$i<self::NOMBRE_REFERENCE;$i++){
            $pic = new Picture();
            $pic->setPicture($pics[$i]);

            $this->addReference(self::LIBELLE_REFERENCE . $i, $pic);

            $manager->persist($pic);
        }

        $manager->flush();
    }
}
