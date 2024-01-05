<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221026133807 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE director (id INT AUTO_INCREMENT NOT NULL, sexoid_id INT NOT NULL, nombre VARCHAR(20) NOT NULL, annosexp INT NOT NULL, INDEX IDX_1E90D3F0286F0FE8 (sexoid_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sexo (id INT AUTO_INCREMENT NOT NULL, descripcion VARCHAR(10) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE director ADD CONSTRAINT FK_1E90D3F0286F0FE8 FOREIGN KEY (sexoid_id) REFERENCES sexo (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE director DROP FOREIGN KEY FK_1E90D3F0286F0FE8');
        $this->addSql('DROP TABLE director');
        $this->addSql('DROP TABLE sexo');
    }
}
