<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250612154449 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE address (id SERIAL NOT NULL, client_id INT NOT NULL, city_id INT NOT NULL, address_type_id INT NOT NULL, address_line1 VARCHAR(100) NOT NULL, address_line2 VARCHAR(100) DEFAULT NULL, PRIMARY KEY(id))
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_D4E6F8119EB6921 ON address (client_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_D4E6F818BAC62AF ON address (city_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_D4E6F819EA97B0B ON address (address_type_id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE address ADD CONSTRAINT FK_D4E6F8119EB6921 FOREIGN KEY (client_id) REFERENCES client (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE address ADD CONSTRAINT FK_D4E6F818BAC62AF FOREIGN KEY (city_id) REFERENCES city (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE address ADD CONSTRAINT FK_D4E6F819EA97B0B FOREIGN KEY (address_type_id) REFERENCES address_type (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE SCHEMA public
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE address DROP CONSTRAINT FK_D4E6F8119EB6921
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE address DROP CONSTRAINT FK_D4E6F818BAC62AF
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE address DROP CONSTRAINT FK_D4E6F819EA97B0B
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE address
        SQL);
    }
}
