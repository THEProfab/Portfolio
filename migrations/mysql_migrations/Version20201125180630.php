<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201125180630 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE background CHANGE picture_id picture_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE background ADD CONSTRAINT FK_BC68B450EE45BDBF FOREIGN KEY (picture_id) REFERENCES picture (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_BC68B450EE45BDBF ON background (picture_id)');
        $this->addSql('ALTER TABLE experiences CHANGE picture_id picture_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE experiences ADD CONSTRAINT FK_82020E70EE45BDBF FOREIGN KEY (picture_id) REFERENCES picture (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_82020E70EE45BDBF ON experiences (picture_id)');
        $this->addSql('ALTER TABLE hobby CHANGE picture_id picture_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE hobby ADD CONSTRAINT FK_3964F337EE45BDBF FOREIGN KEY (picture_id) REFERENCES picture (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_3964F337EE45BDBF ON hobby (picture_id)');
        $this->addSql('ALTER TABLE information CHANGE icon_id icon_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE information ADD CONSTRAINT FK_2979188354B9D732 FOREIGN KEY (icon_id) REFERENCES icon (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_2979188354B9D732 ON information (icon_id)');
        $this->addSql('ALTER TABLE project CHANGE picture_id picture_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE project ADD CONSTRAINT FK_2FB3D0EEEE45BDBF FOREIGN KEY (picture_id) REFERENCES picture (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_2FB3D0EEEE45BDBF ON project (picture_id)');
        $this->addSql('ALTER TABLE quality CHANGE icon_id icon_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE quality ADD CONSTRAINT FK_7CB20B1054B9D732 FOREIGN KEY (icon_id) REFERENCES icon (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_7CB20B1054B9D732 ON quality (icon_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE background DROP FOREIGN KEY FK_BC68B450EE45BDBF');
        $this->addSql('DROP INDEX UNIQ_BC68B450EE45BDBF ON background');
        $this->addSql('ALTER TABLE background CHANGE picture_id picture_id INT NOT NULL');
        $this->addSql('ALTER TABLE experiences DROP FOREIGN KEY FK_82020E70EE45BDBF');
        $this->addSql('DROP INDEX UNIQ_82020E70EE45BDBF ON experiences');
        $this->addSql('ALTER TABLE experiences CHANGE picture_id picture_id INT NOT NULL');
        $this->addSql('ALTER TABLE hobby DROP FOREIGN KEY FK_3964F337EE45BDBF');
        $this->addSql('DROP INDEX UNIQ_3964F337EE45BDBF ON hobby');
        $this->addSql('ALTER TABLE hobby CHANGE picture_id picture_id INT NOT NULL');
        $this->addSql('ALTER TABLE information DROP FOREIGN KEY FK_2979188354B9D732');
        $this->addSql('DROP INDEX UNIQ_2979188354B9D732 ON information');
        $this->addSql('ALTER TABLE information CHANGE icon_id icon_id INT NOT NULL');
        $this->addSql('ALTER TABLE project DROP FOREIGN KEY FK_2FB3D0EEEE45BDBF');
        $this->addSql('DROP INDEX UNIQ_2FB3D0EEEE45BDBF ON project');
        $this->addSql('ALTER TABLE project CHANGE picture_id picture_id INT NOT NULL');
        $this->addSql('ALTER TABLE quality DROP FOREIGN KEY FK_7CB20B1054B9D732');
        $this->addSql('DROP INDEX UNIQ_7CB20B1054B9D732 ON quality');
        $this->addSql('ALTER TABLE quality CHANGE icon_id icon_id INT NOT NULL');
    }
}
