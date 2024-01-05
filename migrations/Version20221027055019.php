<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221027055019 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE tienda (id INT AUTO_INCREMENT NOT NULL, estab_tienda_id INT NOT NULL, nombre VARCHAR(20) NOT NULL, cantdpto INT NOT NULL, cantcajas INT NOT NULL, cafeteria TINYINT(1) DEFAULT NULL, INDEX IDX_C0C6E53E46CAD3B0 (estab_tienda_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE tienda ADD CONSTRAINT FK_C0C6E53E46CAD3B0 FOREIGN KEY (estab_tienda_id) REFERENCES establecimiento (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE tienda DROP FOREIGN KEY FK_C0C6E53E46CAD3B0');
        $this->addSql('DROP TABLE tienda');
    }
}
