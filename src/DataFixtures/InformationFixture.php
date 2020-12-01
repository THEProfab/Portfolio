<?php

namespace App\DataFixtures;

use App\Entity\Information;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class InformationFixture extends Fixture implements DependentFixtureInterface
{
    public const LIBELLE_REFERENCE = 'information_';
    public const NOMBRE_REFERENCE = 6;

    public function load(ObjectManager $manager)
    {
        $infos = ["<a class=\"text-white\" href=\"/assets/CV_Marc_Bayart.pdf\" target='_blank'>Téléchargez mon CV !</a>", "Permis B et véhicule personnel", "Mobilité régionale", "marc.bayart62@gmail.com", "<a class=\"text-white\" href=\"https://www.linkedin.com/in/marc-bayart/\" target='_blank'>Vers mon compte LinkedIn</a>", "+33 6 51 45 78 31"];

        for($i=0;$i<$this::NOMBRE_REFERENCE;$i++){
            $info = new Information();
            $info->setDescription($infos[$i]);
            $info->setIcon($this->getReference(IconFixture::LIBELLE_REFERENCE . $i));

            $this->addReference($this::LIBELLE_REFERENCE . $i, $info);

            $manager->persist($info);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [IconFixture::class];
    }
}
