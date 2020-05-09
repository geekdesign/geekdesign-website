<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200503205400 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE projets ADD responsive_image_laptop VARCHAR(255) DEFAULT NULL, ADD responsive_image_ipad VARCHAR(255) DEFAULT NULL, ADD responsive_image_phone VARCHAR(255) DEFAULT NULL, ADD print_image1 VARCHAR(255) DEFAULT NULL, ADD print_image2 VARCHAR(255) DEFAULT NULL, ADD print_image3 VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE projets DROP responsive_image_laptop, DROP responsive_image_ipad, DROP responsive_image_phone, DROP print_image1, DROP print_image2, DROP print_image3');
    }
}
