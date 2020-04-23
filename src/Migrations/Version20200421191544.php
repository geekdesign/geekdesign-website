<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200421191544 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE projets (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, introduction LONGTEXT DEFAULT NULL, description LONGTEXT DEFAULT NULL, lien VARCHAR(255) DEFAULT NULL, created_at DATETIME NOT NULL, is_online TINYINT(1) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE projets_types (projets_id INT NOT NULL, types_id INT NOT NULL, INDEX IDX_F9BC8612597A6CB7 (projets_id), INDEX IDX_F9BC86128EB23357 (types_id), PRIMARY KEY(projets_id, types_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE projets_technologie (projets_id INT NOT NULL, technologie_id INT NOT NULL, INDEX IDX_1B42517B597A6CB7 (projets_id), INDEX IDX_1B42517B261A27D2 (technologie_id), PRIMARY KEY(projets_id, technologie_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE projets_types ADD CONSTRAINT FK_F9BC8612597A6CB7 FOREIGN KEY (projets_id) REFERENCES projets (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE projets_types ADD CONSTRAINT FK_F9BC86128EB23357 FOREIGN KEY (types_id) REFERENCES types (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE projets_technologie ADD CONSTRAINT FK_1B42517B597A6CB7 FOREIGN KEY (projets_id) REFERENCES projets (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE projets_technologie ADD CONSTRAINT FK_1B42517B261A27D2 FOREIGN KEY (technologie_id) REFERENCES technologie (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE projets_types DROP FOREIGN KEY FK_F9BC8612597A6CB7');
        $this->addSql('ALTER TABLE projets_technologie DROP FOREIGN KEY FK_1B42517B597A6CB7');
        $this->addSql('DROP TABLE projets');
        $this->addSql('DROP TABLE projets_types');
        $this->addSql('DROP TABLE projets_technologie');
    }
}
