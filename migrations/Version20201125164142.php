<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201125164142 extends AbstractMigration
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
        $this->addSql('CREATE TEMPORARY TABLE __temp__user_rabatte AS SELECT rabatt_code, fk_user_id, fk_rabatt_id, used FROM user_rabatte');
        $this->addSql('DROP TABLE user_rabatte');
        $this->addSql('CREATE TABLE user_rabatte (rabatt_code VARCHAR(255) NOT NULL, fk_user_id INTEGER NOT NULL, fk_rabatt_id INTEGER NOT NULL, used BOOLEAN NOT NULL)');
        $this->addSql('INSERT INTO user_rabatte (rabatt_code, fk_user_id, fk_rabatt_id, used) SELECT rabatt_code, fk_user_id, fk_rabatt_id, used FROM __temp__user_rabatte');
        $this->addSql('DROP TABLE __temp__user_rabatte');
        $this->addSql('CREATE TEMPORARY TABLE __temp__verify AS SELECT id, register_date, verfiy_date, code FROM verify');
        $this->addSql('DROP TABLE verify');
        $this->addSql('CREATE TABLE verify (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, register_date DATE NOT NULL, code VARCHAR(1048) NOT NULL COLLATE BINARY, verfiy_date DATE DEFAULT NULL)');
        $this->addSql('INSERT INTO verify (id, register_date, verfiy_date, code) SELECT id, register_date, verfiy_date, code FROM __temp__verify');
        $this->addSql('DROP TABLE __temp__verify');
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
        $this->addSql('CREATE TEMPORARY TABLE __temp__user_rabatte AS SELECT rabatt_code, fk_user_id, fk_rabatt_id, used FROM user_rabatte');
        $this->addSql('DROP TABLE user_rabatte');
        $this->addSql('CREATE TABLE user_rabatte (fk_user_id INTEGER NOT NULL, fk_rabatt_id INTEGER NOT NULL, used BOOLEAN NOT NULL, rabatt_code VARCHAR(255) NOT NULL COLLATE BINARY)');
        $this->addSql('INSERT INTO user_rabatte (rabatt_code, fk_user_id, fk_rabatt_id, used) SELECT rabatt_code, fk_user_id, fk_rabatt_id, used FROM __temp__user_rabatte');
        $this->addSql('DROP TABLE __temp__user_rabatte');
        $this->addSql('CREATE TEMPORARY TABLE __temp__verify AS SELECT id, register_date, verfiy_date, code FROM verify');
        $this->addSql('DROP TABLE verify');
        $this->addSql('CREATE TABLE verify (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, register_date DATE NOT NULL, code VARCHAR(1048) NOT NULL, verfiy_date DATE NOT NULL)');
        $this->addSql('INSERT INTO verify (id, register_date, verfiy_date, code) SELECT id, register_date, verfiy_date, code FROM __temp__verify');
        $this->addSql('DROP TABLE __temp__verify');
    }
}
