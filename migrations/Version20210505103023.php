<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210505103023 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE accidentes (id INT AUTO_INCREMENT NOT NULL, fecha_accidente DATETIME NOT NULL, fecha_alta_accidente DATETIME NOT NULL, consecuencias VARCHAR(500) NOT NULL, actuacion VARCHAR(500) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE medicos_map (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE contacto CHANGE email email VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE residente CHANGE contacto_id contacto_id INT DEFAULT NULL, CHANGE alergias alergias VARCHAR(500) DEFAULT NULL, CHANGE oxigeno oxigeno INT DEFAULT NULL, CHANGE anticoagulante anticoagulante INT DEFAULT NULL, CHANGE hipertension hipertension INT DEFAULT NULL, CHANGE demencia demencia INT DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE accidentes');
        $this->addSql('DROP TABLE medicos_map');
        $this->addSql('ALTER TABLE contacto CHANGE email email VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE residente CHANGE contacto_id contacto_id INT DEFAULT NULL, CHANGE alergias alergias VARCHAR(500) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE oxigeno oxigeno INT DEFAULT NULL, CHANGE anticoagulante anticoagulante INT DEFAULT NULL, CHANGE hipertension hipertension INT DEFAULT NULL, CHANGE demencia demencia INT DEFAULT NULL');
    }
}
