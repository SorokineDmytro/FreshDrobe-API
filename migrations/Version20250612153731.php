<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250612153731 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE auth_info (id SERIAL NOT NULL, client_id INT NOT NULL, password_hash VARCHAR(255) DEFAULT NULL, reset_token VARCHAR(255) DEFAULT NULL, token_expiration TIMESTAMP(0) WITH TIME ZONE DEFAULT NULL, provider VARCHAR(50) DEFAULT NULL, provider_user_id VARCHAR(255) DEFAULT NULL, last_login TIMESTAMP(0) WITH TIME ZONE DEFAULT NULL, PRIMARY KEY(id))
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_E5AFD1E319EB6921 ON auth_info (client_id)
        SQL);
        $this->addSql(<<<'SQL'
            COMMENT ON COLUMN auth_info.token_expiration IS '(DC2Type:datetimetz_immutable)'
        SQL);
        $this->addSql(<<<'SQL'
            COMMENT ON COLUMN auth_info.last_login IS '(DC2Type:datetimetz_immutable)'
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE auth_info ADD CONSTRAINT FK_E5AFD1E319EB6921 FOREIGN KEY (client_id) REFERENCES client (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE SCHEMA public
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE auth_info DROP CONSTRAINT FK_E5AFD1E319EB6921
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE auth_info
        SQL);
    }
}
