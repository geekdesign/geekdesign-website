<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200513184143 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE attachement DROP FOREIGN KEY FK_901C1961EA000B10');
        $this->addSql('CREATE TABLE attachment_class (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('DROP TABLE attachement');
        $this->addSql('DROP TABLE attachement_class');
        $this->addSql('ALTER TABLE attachment ADD class_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE attachment ADD CONSTRAINT FK_795FD9BBEA000B10 FOREIGN KEY (class_id) REFERENCES attachment_class (id)');
        $this->addSql('CREATE INDEX IDX_795FD9BBEA000B10 ON attachment (class_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE attachment DROP FOREIGN KEY FK_795FD9BBEA000B10');
        $this->addSql('CREATE TABLE attachement (id INT AUTO_INCREMENT NOT NULL, class_id INT DEFAULT NULL, INDEX IDX_901C1961EA000B10 (class_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE attachement_class (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE attachement ADD CONSTRAINT FK_901C1961EA000B10 FOREIGN KEY (class_id) REFERENCES attachement_class (id)');
        $this->addSql('DROP TABLE attachment_class');
        $this->addSql('DROP INDEX IDX_795FD9BBEA000B10 ON attachment');
        $this->addSql('ALTER TABLE attachment DROP class_id');
    }
}
