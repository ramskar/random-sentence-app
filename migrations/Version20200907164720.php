<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200907164720 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE sentence (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, sentence VARCHAR(255) NOT NULL, link VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE TEMPORARY TABLE __temp__Word AS SELECT id, word, type, gender FROM Word');
        $this->addSql('DROP TABLE Word');
        $this->addSql('CREATE TABLE Word (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, word VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, gender VARCHAR(255) NOT NULL)');
        $this->addSql('INSERT INTO Word (id, word, type, gender) SELECT id, word, type, gender FROM __temp__Word');
        $this->addSql('DROP TABLE __temp__Word');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE sentence');
        $this->addSql('CREATE TEMPORARY TABLE __temp__word AS SELECT id, type, gender, word FROM word');
        $this->addSql('DROP TABLE word');
        $this->addSql('CREATE TABLE word (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, type VARCHAR(24) NOT NULL COLLATE BINARY, gender VARCHAR(8) NOT NULL COLLATE BINARY, word VARCHAR(36) NOT NULL COLLATE BINARY)');
        $this->addSql('INSERT INTO word (id, type, gender, word) SELECT id, type, gender, word FROM __temp__word');
        $this->addSql('DROP TABLE __temp__word');
    }
}
