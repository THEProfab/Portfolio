<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201130153814 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE experiences CHANGE beginning beginning VARCHAR(255) NOT NULL, CHANGE end end VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE project CHANGE beginning beginning VARCHAR(255) NOT NULL, CHANGE end end VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE experiences CHANGE beginning beginning DATE NOT NULL, CHANGE end end DATE NOT NULL');
        $this->addSql('ALTER TABLE project CHANGE beginning beginning DATE NOT NULL, CHANGE end end DATE NOT NULL');
    }
}
