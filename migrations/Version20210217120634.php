<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210217120634 extends AbstractMigration
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
        $this->addSql('CREATE TABLE qrcode (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, fk_user_id INTEGER DEFAULT NULL, scann_datum DATE DEFAULT NULL, klartext CLOB NOT NULL)');
        $this->addSql('INSERT INTO qrcode (id, fk_user_id, scann_datum, klartext) SELECT id, fk_user_id, scann_datum, klartext FROM __temp__qrcode');
        $this->addSql('DROP TABLE __temp__qrcode');
        $this->addSql('CREATE TEMPORARY TABLE __temp__rabatt AS SELECT id, fk_firma_id, is_percent, needed_points, price, title, text, kategorie, percentage FROM rabatt');
        $this->addSql('DROP TABLE rabatt');
        $this->addSql('CREATE TABLE rabatt (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, fk_firma_id INTEGER NOT NULL, is_percent BOOLEAN NOT NULL, needed_points DOUBLE PRECISION NOT NULL, price DOUBLE PRECISION DEFAULT NULL, percentage DOUBLE PRECISION DEFAULT NULL, title CLOB NOT NULL, text CLOB DEFAULT NULL, kategorie CLOB DEFAULT NULL)');
        $this->addSql('INSERT INTO rabatt (id, fk_firma_id, is_percent, needed_points, price, title, text, kategorie, percentage) SELECT id, fk_firma_id, is_percent, needed_points, price, title, text, kategorie, percentage FROM __temp__rabatt');
        $this->addSql('DROP TABLE __temp__rabatt');
        $this->addSql('CREATE TEMPORARY TABLE __temp__user_rabatte AS SELECT rabatt_code, fk_user_id, fk_rabatt_id, used FROM user_rabatte');
        $this->addSql('DROP TABLE user_rabatte');
        $this->addSql('CREATE TABLE user_rabatte (rabatt_code VARCHAR(255) NOT NULL COLLATE BINARY, fk_user_id INTEGER NOT NULL, fk_rabatt_id INTEGER NOT NULL, used BOOLEAN NOT NULL, PRIMARY KEY(rabatt_code))');
        $this->addSql('INSERT INTO user_rabatte (rabatt_code, fk_user_id, fk_rabatt_id, used) SELECT rabatt_code, fk_user_id, fk_rabatt_id, used FROM __temp__user_rabatte');
        $this->addSql('DROP TABLE __temp__user_rabatte');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__qrcode AS SELECT id, fk_user_id, klartext, scann_datum FROM qrcode');
        $this->addSql('DROP TABLE qrcode');
        $this->addSql('CREATE TABLE qrcode (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, fk_user_id INTEGER NOT NULL, klartext CLOB NOT NULL COLLATE BINARY, scann_datum DATE NOT NULL)');
        $this->addSql('INSERT INTO qrcode (id, fk_user_id, klartext, scann_datum) SELECT id, fk_user_id, klartext, scann_datum FROM __temp__qrcode');
        $this->addSql('DROP TABLE __temp__qrcode');
        $this->addSql('CREATE TEMPORARY TABLE __temp__rabatt AS SELECT id, fk_firma_id, price, percentage, title, text, is_percent, needed_points, kategorie FROM rabatt');
        $this->addSql('DROP TABLE rabatt');
        $this->addSql('CREATE TABLE rabatt (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, fk_firma_id INTEGER NOT NULL, price DOUBLE PRECISION DEFAULT NULL, percentage DOUBLE PRECISION DEFAULT NULL, is_percent BOOLEAN NOT NULL, needed_points DOUBLE PRECISION NOT NULL, title CLOB NOT NULL COLLATE BINARY, text CLOB DEFAULT NULL COLLATE BINARY, kategorie CLOB DEFAULT NULL COLLATE BINARY)');
        $this->addSql('INSERT INTO rabatt (id, fk_firma_id, price, percentage, title, text, is_percent, needed_points, kategorie) SELECT id, fk_firma_id, price, percentage, title, text, is_percent, needed_points, kategorie FROM __temp__rabatt');
        $this->addSql('DROP TABLE __temp__rabatt');
        $this->addSql('CREATE TEMPORARY TABLE __temp__user_rabatte AS SELECT rabatt_code, fk_user_id, fk_rabatt_id, used FROM user_rabatte');
        $this->addSql('DROP TABLE user_rabatte');
        $this->addSql('CREATE TABLE user_rabatte (rabatt_code VARCHAR(255) NOT NULL, fk_user_id INTEGER NOT NULL, fk_rabatt_id INTEGER NOT NULL, used BOOLEAN NOT NULL)');
        $this->addSql('INSERT INTO user_rabatte (rabatt_code, fk_user_id, fk_rabatt_id, used) SELECT rabatt_code, fk_user_id, fk_rabatt_id, used FROM __temp__user_rabatte');
        $this->addSql('DROP TABLE __temp__user_rabatte');
    }
}
