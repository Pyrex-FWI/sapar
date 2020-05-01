<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200420201018 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TEMPORARY TABLE __temp__mefia_file AS SELECT id, file_path, hash FROM mefia_file');
        $this->addSql('DROP TABLE mefia_file');
        $this->addSql('CREATE TABLE mefia_file (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, file_path CLOB NOT NULL COLLATE BINARY, hash VARCHAR(50) DEFAULT NULL COLLATE BINARY)');
        $this->addSql('INSERT INTO mefia_file (id, file_path, hash) SELECT id, file_path, hash FROM __temp__mefia_file');
        $this->addSql('DROP TABLE __temp__mefia_file');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_DFDEEBED1B862B8 ON mefia_file (hash)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('DROP INDEX UNIQ_DFDEEBED1B862B8');
        $this->addSql('CREATE TEMPORARY TABLE __temp__mefia_file AS SELECT id, file_path, hash FROM mefia_file');
        $this->addSql('DROP TABLE mefia_file');
        $this->addSql('CREATE TABLE mefia_file (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, file_path CLOB NOT NULL, hash VARCHAR(50) DEFAULT NULL)');
        $this->addSql('INSERT INTO mefia_file (id, file_path, hash) SELECT id, file_path, hash FROM __temp__mefia_file');
        $this->addSql('DROP TABLE __temp__mefia_file');
    }
}
