<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221027043635 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE trailer (id INT AUTO_INCREMENT NOT NULL, estabtrailer_id INT NOT NULL, nevera TINYINT(1) DEFAULT NULL, contratohel TINYINT(1) DEFAULT NULL, fecha DATE NOT NULL, INDEX IDX_C691DC4EA42C5316 (estabtrailer_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE trailer ADD CONSTRAINT FK_C691DC4EA42C5316 FOREIGN KEY (estabtrailer_id) REFERENCES establecimiento (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE trailer DROP FOREIGN KEY FK_C691DC4EA42C5316');
        $this->addSql('DROP TABLE trailer');
    }
}
