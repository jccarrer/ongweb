<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190716191319 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE cargos (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(255) NOT NULL, telefono VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cargos_proyecto (id INT AUTO_INCREMENT NOT NULL, proyecto_id INT NOT NULL, cargo_id INT NOT NULL, INDEX IDX_6A690178F625D1BA (proyecto_id), INDEX IDX_6A690178813AC380 (cargo_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE osc (id INT AUTO_INCREMENT NOT NULL, usuario_id INT DEFAULT NULL, nombre VARCHAR(255) NOT NULL, direccion VARCHAR(255) NOT NULL, ciudad VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, telefono VARCHAR(255) NOT NULL, ruc VARCHAR(255) NOT NULL, estatutos VARCHAR(255) NOT NULL, cta_bancaria VARCHAR(255) NOT NULL, ci_representante VARCHAR(255) NOT NULL, ci_uafe VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_6C634FD8DB38439E (usuario_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE proyecto (id INT AUTO_INCREMENT NOT NULL, osc_id INT NOT NULL, nombre VARCHAR(255) NOT NULL, tematica VARCHAR(255) NOT NULL, presupuesto_total DOUBLE PRECISION NOT NULL, gastos DOUBLE PRECISION NOT NULL, inversiones DOUBLE PRECISION NOT NULL, INDEX IDX_6FD202B94681C2FC (osc_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE cargos_proyecto ADD CONSTRAINT FK_6A690178F625D1BA FOREIGN KEY (proyecto_id) REFERENCES proyecto (id)');
        $this->addSql('ALTER TABLE cargos_proyecto ADD CONSTRAINT FK_6A690178813AC380 FOREIGN KEY (cargo_id) REFERENCES cargos (id)');
        $this->addSql('ALTER TABLE osc ADD CONSTRAINT FK_6C634FD8DB38439E FOREIGN KEY (usuario_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE proyecto ADD CONSTRAINT FK_6FD202B94681C2FC FOREIGN KEY (osc_id) REFERENCES osc (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE cargos_proyecto DROP FOREIGN KEY FK_6A690178813AC380');
        $this->addSql('ALTER TABLE proyecto DROP FOREIGN KEY FK_6FD202B94681C2FC');
        $this->addSql('ALTER TABLE cargos_proyecto DROP FOREIGN KEY FK_6A690178F625D1BA');
        $this->addSql('DROP TABLE cargos');
        $this->addSql('DROP TABLE cargos_proyecto');
        $this->addSql('DROP TABLE osc');
        $this->addSql('DROP TABLE proyecto');
    }
}
