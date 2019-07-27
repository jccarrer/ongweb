<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190716194936 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE cargos (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(255) NOT NULL, descripcion VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cargos_proyecto (id INT AUTO_INCREMENT NOT NULL, proyecto_id INT NOT NULL, cargo_id INT NOT NULL, nombre VARCHAR(255) NOT NULL, telefono VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, INDEX IDX_6A690178F625D1BA (proyecto_id), INDEX IDX_6A690178813AC380 (cargo_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE cargos_proyecto ADD CONSTRAINT FK_6A690178F625D1BA FOREIGN KEY (proyecto_id) REFERENCES proyecto (id)');
        $this->addSql('ALTER TABLE cargos_proyecto ADD CONSTRAINT FK_6A690178813AC380 FOREIGN KEY (cargo_id) REFERENCES cargos (id)');
        $this->addSql('ALTER TABLE osc CHANGE usuario_id usuario_id INT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE cargos_proyecto DROP FOREIGN KEY FK_6A690178813AC380');
        $this->addSql('DROP TABLE cargos');
        $this->addSql('DROP TABLE cargos_proyecto');
        $this->addSql('ALTER TABLE osc CHANGE usuario_id usuario_id INT DEFAULT NULL');
    }
}
