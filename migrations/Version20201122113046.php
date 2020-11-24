<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201122113046 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__qrcode AS SELECT id, fk_user_id, scann_datum, klartext FROM qrcode');
        $this->addSql('DROP TABLE qrcode');
        $this->addSql('CREATE TABLE qrcode (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, fk_user_id INTEGER NOT NULL, scann_datum DATE NOT NULL, klartext CLOB NOT NULL)');
        $this->addSql('INSERT INTO qrcode (id, fk_user_id, scann_datum, klartext) SELECT id, fk_user_id, scann_datum, klartext FROM __temp__qrcode');
        $this->addSql('DROP TABLE __temp__qrcode');
        $this->addSql('CREATE TEMPORARY TABLE __temp__rabatt AS SELECT id, fk_firma_id, x_punkte_fuer_1_rabatt, datei, beschreibung, rabattbeschreibung FROM rabatt');
        $this->addSql('DROP TABLE rabatt');
        $this->addSql('CREATE TABLE rabatt (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, fk_firma_id INTEGER NOT NULL, x_punkte_fuer_1_rabatt DOUBLE PRECISION NOT NULL, datei BLOB DEFAULT NULL, beschreibung CLOB DEFAULT NULL, rabattbeschreibung CLOB DEFAULT NULL)');
        $this->addSql('INSERT INTO rabatt (id, fk_firma_id, x_punkte_fuer_1_rabatt, datei, beschreibung, rabattbeschreibung) SELECT id, fk_firma_id, x_punkte_fuer_1_rabatt, datei, beschreibung, rabattbeschreibung FROM __temp__rabatt');
        $this->addSql('DROP TABLE __temp__rabatt');
        $this->addSql('CREATE TEMPORARY TABLE __temp__user AS SELECT id, username, email, vorname, nachname, password, verified FROM user');
        $this->addSql('DROP TABLE user');
        $this->addSql('CREATE TABLE user (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, username VARCHAR(255) NOT NULL COLLATE BINARY, email VARCHAR(255) NOT NULL COLLATE BINARY, vorname VARCHAR(255) DEFAULT NULL COLLATE BINARY, nachname VARCHAR(255) DEFAULT NULL COLLATE BINARY, password VARCHAR(255) DEFAULT NULL COLLATE BINARY, verified BOOLEAN NOT NULL)');
        $this->addSql('INSERT INTO user (id, username, email, vorname, nachname, password, verified) SELECT id, username, email, vorname, nachname, password, verified FROM __temp__user');
        $this->addSql('DROP TABLE __temp__user');
        $this->addSql('CREATE TEMPORARY TABLE __temp__user_rabatte AS SELECT rabatt_code, fk_user_id, fk_rabatt_id, used FROM user_rabatte');
        $this->addSql('DROP TABLE user_rabatte');
        $this->addSql('CREATE TABLE user_rabatte (rabatt_code VARCHAR(255) NOT NULL, fk_user_id INTEGER NOT NULL, fk_rabatt_id INTEGER NOT NULL, used BOOLEAN NOT NULL)');
        $this->addSql('INSERT INTO user_rabatte (rabatt_code, fk_user_id, fk_rabatt_id, used) SELECT rabatt_code, fk_user_id, fk_rabatt_id, used FROM __temp__user_rabatte');
        $this->addSql('DROP TABLE __temp__user_rabatte');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__qrcode AS SELECT id, fk_user_id, klartext, scann_datum FROM qrcode');
        $this->addSql('DROP TABLE qrcode');
        $this->addSql('CREATE TABLE qrcode (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, fk_user_id INTEGER NOT NULL, scann_datum DATE NOT NULL, klartext CLOB NOT NULL COLLATE BINARY)');
        $this->addSql('INSERT INTO qrcode (id, fk_user_id, klartext, scann_datum) SELECT id, fk_user_id, klartext, scann_datum FROM __temp__qrcode');
        $this->addSql('DROP TABLE __temp__qrcode');
        $this->addSql('CREATE TEMPORARY TABLE __temp__rabatt AS SELECT id, fk_firma_id, x_punkte_fuer_1_rabatt, beschreibung, rabattbeschreibung, datei FROM rabatt');
        $this->addSql('DROP TABLE rabatt');
        $this->addSql('CREATE TABLE rabatt (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, fk_firma_id INTEGER NOT NULL, x_punkte_fuer_1_rabatt DOUBLE PRECISION NOT NULL, datei BLOB DEFAULT NULL, beschreibung CLOB DEFAULT NULL COLLATE BINARY, rabattbeschreibung CLOB DEFAULT NULL COLLATE BINARY)');
        $this->addSql('INSERT INTO rabatt (id, fk_firma_id, x_punkte_fuer_1_rabatt, beschreibung, rabattbeschreibung, datei) SELECT id, fk_firma_id, x_punkte_fuer_1_rabatt, beschreibung, rabattbeschreibung, datei FROM __temp__rabatt');
        $this->addSql('DROP TABLE __temp__rabatt');
        $this->addSql('CREATE TEMPORARY TABLE __temp__user AS SELECT id, username, email, vorname, nachname, password, verified FROM user');
        $this->addSql('DROP TABLE user');
        $this->addSql('CREATE TABLE user (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, username VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, vorname VARCHAR(255) DEFAULT NULL, nachname VARCHAR(255) DEFAULT NULL, password VARCHAR(255) DEFAULT NULL, verified BOOLEAN DEFAULT NULL)');
        $this->addSql('INSERT INTO user (id, username, email, vorname, nachname, password, verified) SELECT id, username, email, vorname, nachname, password, verified FROM __temp__user');
        $this->addSql('DROP TABLE __temp__user');
        $this->addSql('CREATE TEMPORARY TABLE __temp__user_rabatte AS SELECT rabatt_code, fk_user_id, fk_rabatt_id, used FROM user_rabatte');
        $this->addSql('DROP TABLE user_rabatte');
        $this->addSql('CREATE TABLE user_rabatte (fk_user_id INTEGER NOT NULL, fk_rabatt_id INTEGER NOT NULL, used BOOLEAN NOT NULL, rabatt_code VARCHAR(255) NOT NULL COLLATE BINARY)');
        $this->addSql('INSERT INTO user_rabatte (rabatt_code, fk_user_id, fk_rabatt_id, used) SELECT rabatt_code, fk_user_id, fk_rabatt_id, used FROM __temp__user_rabatte');
        $this->addSql('DROP TABLE __temp__user_rabatte');
    }
}
