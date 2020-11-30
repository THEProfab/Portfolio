<?php

namespace App\DataFixtures;

use App\Entity\Experiences;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ExperiencesFixture extends Fixture implements DependentFixtureInterface
{
    public const LIBELLE_REFERENCE = 'experience_';
    public const NOMBRE_REFERENCE = 2;

    public function load(ObjectManager $manager)
    {
        $exps = [
            ["Hôte d'accueil", "Agence BNP Paribas, Saint Pol-sur-Ternoise", "2019-07-06", "2019-08-08", "Ayant 18 ans, j'ai pu avoir une première expérience en entreprise chez BNP Paribas. En tant qu'hôte d'accueil en agence, je me suis occupé d'accueillir les clients et de réaliser certaines opérations bancaires basiques."],
            ["Mission d'archivage", "BNP Paribas, Lille et Marcq-en-Barœul", "2020-08-03", "2020-08-28", "La première expérience s'étant bien passée, j'ai décidé de travailler une nouvelle fois pour BNP Paribas durant les vacances d'été. Cette fois-ci, je me suis occupé d'archiver au format numérique des documents au format papier. Cela n'a pas été simple à cause de la chaleur et la Covid mais j'ai, malgré tout, réussi à atteindre l'objectif fixé."]
        ];

        for ($i = 0;$i<self::NOMBRE_REFERENCE;$i++){
            $exp = new Experiences();
            $exp->setJob($exps[$i][0])
                ->setCompany($exps[$i][1])
                ->setBeginning($exps[$i][2])
                ->setEnd($exps[$i][3])
                ->setDescription($exps[$i][4])
                ->setPicture($this->getReference(PictureFixture::LIBELLE_REFERENCE . ($i+2))); // car il y a déjà les images des backgrounds

            $this->addReference(self::LIBELLE_REFERENCE . $i, $exp);

            $manager->persist($exp);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [PictureFixture::class];
    }
}
