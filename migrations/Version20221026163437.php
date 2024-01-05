<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221026163437 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE establecimiento (id INT AUTO_INCREMENT NOT NULL, directorid_id INT NOT NULL, direccionid_id INT NOT NULL, codigo INT NOT NULL, canttrab INT NOT NULL, cantprod INT NOT NULL, INDEX IDX_94A4D17E2AC35F52 (directorid_id), INDEX IDX_94A4D17E42A20EBC (direccionid_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE establecimiento ADD CONSTRAINT FK_94A4D17E2AC35F52 FOREIGN KEY (directorid_id) REFERENCES director (id)');
        $this->addSql('ALTER TABLE establecimiento ADD CONSTRAINT FK_94A4D17E42A20EBC FOREIGN KEY (direccionid_id) REFERENCES direccion (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE establecimiento DROP FOREIGN KEY FK_94A4D17E2AC35F52');
        $this->addSql('ALTER TABLE establecimiento DROP FOREIGN KEY FK_94A4D17E42A20EBC');
        $this->addSql('DROP TABLE establecimiento');
    }
}
