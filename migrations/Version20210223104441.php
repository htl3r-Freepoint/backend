<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210223104441 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE firma ADD COLUMN app_aufrufe INTEGER DEFAULT NULL');
        $this->addSql('ALTER TABLE firma ADD COLUMN kaeufe_rabatte INTEGER DEFAULT NULL');
        $this->addSql('ALTER TABLE firma ADD COLUMN genutzte_rabatte INTEGER DEFAULT NULL');
        $this->addSql('ALTER TABLE firma ADD COLUMN gescannte_rechnungen INTEGER DEFAULT NULL');
        $this->addSql('CREATE TEMPORARY TABLE __temp__qrcode AS SELECT id, fk_user_id, scann_datum, klartext FROM qrcode');
        $this->addSql('DROP TABLE qrcode');
        $this->addSql('CREATE TABLE qrcode (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, fk_user_id INTEGER DEFAULT NULL, scann_datum DATE DEFAULT NULL, klartext CLOB NOT NULL)');
        $this->addSql('INSERT INTO qrcode (id, fk_user_id, scann_datum, klartext) SELECT id, fk_user_id, scann_datum, klartext FROM __temp__qrcode');
        $this->addSql('DROP TABLE __temp__qrcode');
        $this->addSql('CREATE TEMPORARY TABLE __temp__rabatt AS SELECT id, fk_firma_id, is_percent, needed_points, price, percentage, title, text, kategorie FROM rabatt');
        $this->addSql('DROP TABLE rabatt');
        $this->addSql('CREATE TABLE rabatt (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, fk_firma_id INTEGER NOT NULL, is_percent BOOLEAN NOT NULL, needed_points DOUBLE PRECISION NOT NULL, price DOUBLE PRECISION DEFAULT NULL, percentage DOUBLE PRECISION DEFAULT NULL, title CLOB NOT NULL, text CLOB DEFAULT NULL, kategorie CLOB DEFAULT NULL)');
        $this->addSql('INSERT INTO rabatt (id, fk_firma_id, is_percent, needed_points, price, percentage, title, text, kategorie) SELECT id, fk_firma_id, is_percent, needed_points, price, percentage, title, text, kategorie FROM __temp__rabatt');
        $this->addSql('DROP TABLE __temp__rabatt');
        $this->addSql('CREATE TEMPORARY TABLE __temp__widerspruchsrecht AS SELECT id, email, data FROM widerspruchsrecht');
        $this->addSql('DROP TABLE widerspruchsrecht');
        $this->addSql('CREATE TABLE widerspruchsrecht (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, email VARCHAR(255) NOT NULL COLLATE BINARY, data CLOB NOT NULL)');
        $this->addSql('INSERT INTO widerspruchsrecht (id, email, data) SELECT id, email, data FROM __temp__widerspruchsrecht');
        $this->addSql('DROP TABLE __temp__widerspruchsrecht');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__firma AS SELECT id, fk_user_id__owner, firmanname, kontakt_email, xeuro_fuer1_punkt, datei, domain FROM firma');
        $this->addSql('DROP TABLE firma');
        $this->addSql('CREATE TABLE firma (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, fk_user_id__owner INTEGER DEFAULT NULL, firmanname VARCHAR(255) NOT NULL, kontakt_email VARCHAR(255) DEFAULT NULL, xeuro_fuer1_punkt DOUBLE PRECISION DEFAULT NULL, datei BLOB DEFAULT NULL, domain VARCHAR(255) DEFAULT NULL)');
        $this->addSql('INSERT INTO firma (id, fk_user_id__owner, firmanname, kontakt_email, xeuro_fuer1_punkt, datei, domain) SELECT id, fk_user_id__owner, firmanname, kontakt_email, xeuro_fuer1_punkt, datei, domain FROM __temp__firma');
        $this->addSql('DROP TABLE __temp__firma');
        $this->addSql('CREATE TEMPORARY TABLE __temp__qrcode AS SELECT id, fk_user_id, klartext, scann_datum FROM qrcode');
        $this->addSql('DROP TABLE qrcode');
        $this->addSql('CREATE TABLE qrcode (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, fk_user_id INTEGER DEFAULT NULL, scann_datum DATE DEFAULT NULL, klartext CLOB NOT NULL COLLATE BINARY)');
        $this->addSql('INSERT INTO qrcode (id, fk_user_id, klartext, scann_datum) SELECT id, fk_user_id, klartext, scann_datum FROM __temp__qrcode');
        $this->addSql('DROP TABLE __temp__qrcode');
        $this->addSql('CREATE TEMPORARY TABLE __temp__rabatt AS SELECT id, fk_firma_id, price, percentage, title, text, is_percent, needed_points, kategorie FROM rabatt');
        $this->addSql('DROP TABLE rabatt');
        $this->addSql('CREATE TABLE rabatt (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, fk_firma_id INTEGER NOT NULL, price DOUBLE PRECISION DEFAULT NULL, percentage DOUBLE PRECISION DEFAULT NULL, is_percent BOOLEAN NOT NULL, needed_points DOUBLE PRECISION NOT NULL, title CLOB NOT NULL COLLATE BINARY, text CLOB DEFAULT NULL COLLATE BINARY, kategorie CLOB DEFAULT NULL COLLATE BINARY)');
        $this->addSql('INSERT INTO rabatt (id, fk_firma_id, price, percentage, title, text, is_percent, needed_points, kategorie) SELECT id, fk_firma_id, price, percentage, title, text, is_percent, needed_points, kategorie FROM __temp__rabatt');
        $this->addSql('DROP TABLE __temp__rabatt');
        $this->addSql('CREATE TEMPORARY TABLE __temp__widerspruchsrecht AS SELECT id, email, data FROM widerspruchsrecht');
        $this->addSql('DROP TABLE widerspruchsrecht');
        $this->addSql('CREATE TABLE widerspruchsrecht (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, email VARCHAR(255) NOT NULL, data CLOB NOT NULL COLLATE BINARY)');
        $this->addSql('INSERT INTO widerspruchsrecht (id, email, data) SELECT id, email, data FROM __temp__widerspruchsrecht');
        $this->addSql('DROP TABLE __temp__widerspruchsrecht');
    }
}
