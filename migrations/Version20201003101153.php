<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201003101153 extends AbstractMigration {
    public function getDescription(): string {
        return '';
    }

    public function up(Schema $schema): void {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE angestellte (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, fk_user_id INTEGER NOT NULL, fk_fimra_id INTEGER NOT NULL, rechte INTEGER DEFAULT NULL)');
        $this->addSql('CREATE TABLE betrieb (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, fk_firma_id INTEGER NOT NULL, addresse VARCHAR(1024) DEFAULT NULL, plz VARCHAR(128) DEFAULT NULL, ort VARCHAR(255) DEFAULT NULL)');
        $this->addSql('CREATE TABLE design (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(255) NOT NULL, datei BLOB NOT NULL)');
        $this->addSql('CREATE TABLE design_zuweisung (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, fk_firma_id INTEGER NOT NULL, fk_design_id INTEGER NOT NULL)');
        $this->addSql('CREATE TABLE firma (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, fk_user_id__owner INTEGER DEFAULT NULL, firmanname VARCHAR(255) NOT NULL, kontakt_email VARCHAR(255) DEFAULT NULL, xeuro_fuer1_punkt DOUBLE PRECISION DEFAULT NULL, datei BLOB DEFAULT NULL, domain VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE TABLE password (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, fk_user_id INTEGER NOT NULL, password VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE TABLE punkte (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, fk_user_id INTEGER NOT NULL, fk_firma_id INTEGER NOT NULL, punkte DOUBLE PRECISION DEFAULT NULL)');
        $this->addSql('CREATE TABLE qrcode (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, fk_user_id INTEGER NOT NULL, klartext VARCHAR(2048) NOT NULL, scann_datum DATE NOT NULL)');
        $this->addSql('CREATE TABLE rabatt (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, fk_firma_id INTEGER NOT NULL, x_punkte_fuer_1_rabatt DOUBLE PRECISION NOT NULL, beschreibung CLOB DEFAULT NULL, rabattbeschreibung CLOB DEFAULT NULL, datei BLOB DEFAULT NULL)');
        $this->addSql('CREATE TABLE user (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, username VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, vorname VARCHAR(255) DEFAULT NULL, nachname VARCHAR(255) DEFAULT NULL)');
        $this->addSql('CREATE TABLE user_rabatte (rabatt_code INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, fk_user_id INTEGER NOT NULL, fk_rabatt_id INTEGER NOT NULL)');
    }

    public function down(Schema $schema): void {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE angestellte');
        $this->addSql('DROP TABLE betrieb');
        $this->addSql('DROP TABLE design');
        $this->addSql('DROP TABLE design_zuweisung');
        $this->addSql('DROP TABLE firma');
        $this->addSql('DROP TABLE password');
        $this->addSql('DROP TABLE punkte');
        $this->addSql('DROP TABLE qrcode');
        $this->addSql('DROP TABLE rabatt');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE user_rabatte');
    }
}
