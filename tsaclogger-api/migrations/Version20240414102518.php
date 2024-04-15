<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240414102518 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP SEQUENCE route_id_seq CASCADE');
        $this->addSql('CREATE SEQUENCE climbing_route_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE climbing_route (id INT NOT NULL, name VARCHAR(255) DEFAULT NULL, setter VARCHAR(255) DEFAULT NULL, color VARCHAR(7) NOT NULL, position JSON NOT NULL, PRIMARY KEY(id))');
        $this->addSql('DROP TABLE route');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE climbing_route_id_seq CASCADE');
        $this->addSql('CREATE SEQUENCE route_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE route (id INT NOT NULL, name VARCHAR(255) DEFAULT NULL, setter VARCHAR(255) DEFAULT NULL, color VARCHAR(7) NOT NULL, "position" JSON NOT NULL, PRIMARY KEY(id))');
        $this->addSql('DROP TABLE climbing_route');
    }
}
