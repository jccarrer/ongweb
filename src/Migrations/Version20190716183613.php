<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190716183613 extends AbstractMigration
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
        $this->addSql('CREATE TABLE cargos_proyecto (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cargos_proyecto_proyecto (cargos_proyecto_id INT NOT NULL, proyecto_id INT NOT NULL, INDEX IDX_7182038011D6140F (cargos_proyecto_id), INDEX IDX_71820380F625D1BA (proyecto_id), PRIMARY KEY(cargos_proyecto_id, proyecto_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cargos_proyecto_cargos (cargos_proyecto_id INT NOT NULL, cargos_id INT NOT NULL, INDEX IDX_1166C8C711D6140F (cargos_proyecto_id), INDEX IDX_1166C8C7A4804C6 (cargos_id), PRIMARY KEY(cargos_proyecto_id, cargos_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE osc (id INT AUTO_INCREMENT NOT NULL, id_usuario_id INT NOT NULL, nombre VARCHAR(255) NOT NULL, direccion VARCHAR(255) NOT NULL, ciudad VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, telefono VARCHAR(255) NOT NULL, ruc VARCHAR(255) NOT NULL, estatuto VARCHAR(255) NOT NULL, cta_bancaria VARCHAR(255) NOT NULL, ci_representate VARCHAR(255) NOT NULL, ci_uafe VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_6C634FD87EB2C349 (id_usuario_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE proyecto (id INT AUTO_INCREMENT NOT NULL, id_osc_id INT NOT NULL, nombre VARCHAR(255) NOT NULL, tematica VARCHAR(255) NOT NULL, presupuesto_total DOUBLE PRECISION NOT NULL, gastos DOUBLE PRECISION NOT NULL, inversiones DOUBLE PRECISION NOT NULL, INDEX IDX_6FD202B960B67711 (id_osc_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE cargos_proyecto_proyecto ADD CONSTRAINT FK_7182038011D6140F FOREIGN KEY (cargos_proyecto_id) REFERENCES cargos_proyecto (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE cargos_proyecto_proyecto ADD CONSTRAINT FK_71820380F625D1BA FOREIGN KEY (proyecto_id) REFERENCES proyecto (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE cargos_proyecto_cargos ADD CONSTRAINT FK_1166C8C711D6140F FOREIGN KEY (cargos_proyecto_id) REFERENCES cargos_proyecto (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE cargos_proyecto_cargos ADD CONSTRAINT FK_1166C8C7A4804C6 FOREIGN KEY (cargos_id) REFERENCES cargos (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE osc ADD CONSTRAINT FK_6C634FD87EB2C349 FOREIGN KEY (id_usuario_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE proyecto ADD CONSTRAINT FK_6FD202B960B67711 FOREIGN KEY (id_osc_id) REFERENCES osc (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE cargos_proyecto_cargos DROP FOREIGN KEY FK_1166C8C7A4804C6');
        $this->addSql('ALTER TABLE cargos_proyecto_proyecto DROP FOREIGN KEY FK_7182038011D6140F');
        $this->addSql('ALTER TABLE cargos_proyecto_cargos DROP FOREIGN KEY FK_1166C8C711D6140F');
        $this->addSql('ALTER TABLE proyecto DROP FOREIGN KEY FK_6FD202B960B67711');
        $this->addSql('ALTER TABLE cargos_proyecto_proyecto DROP FOREIGN KEY FK_71820380F625D1BA');
        $this->addSql('DROP TABLE cargos');
        $this->addSql('DROP TABLE cargos_proyecto');
        $this->addSql('DROP TABLE cargos_proyecto_proyecto');
        $this->addSql('DROP TABLE cargos_proyecto_cargos');
        $this->addSql('DROP TABLE osc');
        $this->addSql('DROP TABLE proyecto');
    }
}
