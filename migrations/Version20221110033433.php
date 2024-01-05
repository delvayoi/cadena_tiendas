<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221110033433 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE productos (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(20) NOT NULL, cantidad INT NOT NULL, precio DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE productos_establecimiento (productos_id INT NOT NULL, establecimiento_id INT NOT NULL, INDEX IDX_3C65CFF6ED07566B (productos_id), INDEX IDX_3C65CFF671B61351 (establecimiento_id), PRIMARY KEY(productos_id, establecimiento_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE productos_establecimiento ADD CONSTRAINT FK_3C65CFF6ED07566B FOREIGN KEY (productos_id) REFERENCES productos (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE productos_establecimiento ADD CONSTRAINT FK_3C65CFF671B61351 FOREIGN KEY (establecimiento_id) REFERENCES establecimiento (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE productos_establecimiento DROP FOREIGN KEY FK_3C65CFF6ED07566B');
        $this->addSql('ALTER TABLE productos_establecimiento DROP FOREIGN KEY FK_3C65CFF671B61351');
        $this->addSql('DROP TABLE productos');
        $this->addSql('DROP TABLE productos_establecimiento');
    }
}
