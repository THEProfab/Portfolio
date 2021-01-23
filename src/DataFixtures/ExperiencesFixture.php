<?php

namespace App\DataFixtures;

use App\Entity\Experiences;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ExperiencesFixture extends Fixture implements DependentFixtureInterface
{
    public const LIBELLE_REFERENCE = 'experience_';
    public const NOMBRE_REFERENCE = 3;

    public function load(ObjectManager $manager)
    {
        $exps = [
            ["Hôte d'accueil", "Agence BNP Paribas, Saint Pol-sur-Ternoise", "du 6 juillet", "au 8 août 2019", "Ayant 18 ans, j'ai décidé de travailler en juillet afin d'avoir une première expérience en entreprise chez BNP Paribas. En tant qu'hôte d'accueil en agence, je me suis occupé d'accueillir les clients et de réaliser certaines opérations bancaires basiques."],
            ["Mission d'archivage", "BNP Paribas, Lille et Marcq-en-Barœul", "du 3 août", "au 28 août 2020", "La première expérience s'étant bien passée, j'ai décidé de travailler une nouvelle fois pour BNP Paribas durant les vacances d'été. Cette fois-ci, je me suis occupé d'archiver au format numérique des documents au format papier. Cela n'a pas été simple à cause de la chaleur et la Covid mais j'ai, malgré tout, réussi à atteindre l'objectif fixé."],
            ["Tutorat", "IUT de Lens", "de février 2021", "à juin 2021 (dates précises encore inconnues)", "L'IUT a proposé du tutorat dispensé par des étudiants de deuxième année aux étudiants de première année afin de les aider notamment en algorithmique et en programation. Ayant de bons résultats, je me suis donc porté volontaire afin de dispenser ce tutorat à un petit groupe de 5 étudiants."]
        ];

        for ($i = 0;$i<self::NOMBRE_REFERENCE;$i++){
            $exp = new Experiences();
            $exp->setJob($exps[$i][0])
                ->setCompany($exps[$i][1])
                ->setStartDate($exps[$i][2])
                ->setEndDate($exps[$i][3])
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
