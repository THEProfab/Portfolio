<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210117153007 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE background (id INT NOT NULL, picture_id INT DEFAULT NULL, degree VARCHAR(255) NOT NULL, school VARCHAR(255) NOT NULL, description TEXT DEFAULT NULL, start_date VARCHAR(255) NOT NULL, end_date VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_BC68B450EE45BDBF ON background (picture_id)');
        $this->addSql('CREATE TABLE experiences (id INT NOT NULL, picture_id INT DEFAULT NULL, company VARCHAR(255) NOT NULL, job VARCHAR(255) NOT NULL, description TEXT NOT NULL, start_date VARCHAR(255) NOT NULL, end_date VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_82020E70EE45BDBF ON experiences (picture_id)');
        $this->addSql('CREATE TABLE hobby (id INT NOT NULL, picture_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, description TEXT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_3964F337EE45BDBF ON hobby (picture_id)');
        $this->addSql('CREATE TABLE icon (id INT NOT NULL, icon VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE information (id INT NOT NULL, icon_id INT DEFAULT NULL, description VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_2979188354B9D732 ON information (icon_id)');
        $this->addSql('CREATE TABLE picture (id INT NOT NULL, picture VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE project (id INT NOT NULL, picture_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, description TEXT NOT NULL, start_date VARCHAR(255) NOT NULL, end_date VARCHAR(255) NOT NULL, link VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_2FB3D0EEEE45BDBF ON project (picture_id)');
        $this->addSql('CREATE TABLE quality (id INT NOT NULL, icon_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, description TEXT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_7CB20B1054B9D732 ON quality (icon_id)');
        $this->addSql('ALTER TABLE background ADD CONSTRAINT FK_BC68B450EE45BDBF FOREIGN KEY (picture_id) REFERENCES picture (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE experiences ADD CONSTRAINT FK_82020E70EE45BDBF FOREIGN KEY (picture_id) REFERENCES picture (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE hobby ADD CONSTRAINT FK_3964F337EE45BDBF FOREIGN KEY (picture_id) REFERENCES picture (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE information ADD CONSTRAINT FK_2979188354B9D732 FOREIGN KEY (icon_id) REFERENCES icon (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE project ADD CONSTRAINT FK_2FB3D0EEEE45BDBF FOREIGN KEY (picture_id) REFERENCES picture (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE quality ADD CONSTRAINT FK_7CB20B1054B9D732 FOREIGN KEY (icon_id) REFERENCES icon (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE information DROP CONSTRAINT FK_2979188354B9D732');
        $this->addSql('ALTER TABLE quality DROP CONSTRAINT FK_7CB20B1054B9D732');
        $this->addSql('ALTER TABLE background DROP CONSTRAINT FK_BC68B450EE45BDBF');
        $this->addSql('ALTER TABLE experiences DROP CONSTRAINT FK_82020E70EE45BDBF');
        $this->addSql('ALTER TABLE hobby DROP CONSTRAINT FK_3964F337EE45BDBF');
        $this->addSql('ALTER TABLE project DROP CONSTRAINT FK_2FB3D0EEEE45BDBF');
        $this->addSql('DROP TABLE background');
        $this->addSql('DROP TABLE experiences');
        $this->addSql('DROP TABLE hobby');
        $this->addSql('DROP TABLE icon');
        $this->addSql('DROP TABLE information');
        $this->addSql('DROP TABLE picture');
        $this->addSql('DROP TABLE project');
        $this->addSql('DROP TABLE quality');
    }
}
