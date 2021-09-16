<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210225072306 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE company_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE partner_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE company (id INT NOT NULL, name VARCHAR(255) NOT NULL, fantasy VARCHAR(255) NOT NULL, cnpj VARCHAR(18) NOT NULL, port VARCHAR(255) NOT NULL, nature VARCHAR(255) NOT NULL, phone VARCHAR(14) NOT NULL, mail VARCHAR(255) NOT NULL, cep VARCHAR(9) NOT NULL, state VARCHAR(40) NOT NULL, city VARCHAR(40) NOT NULL, district VARCHAR(40) NOT NULL, street VARCHAR(80) NOT NULL, number VARCHAR(10) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE partner (id INT NOT NULL, name VARCHAR(255) NOT NULL, cpf VARCHAR(14) NOT NULL, phone VARCHAR(14) NOT NULL, mail VARCHAR(80) NOT NULL, cep VARCHAR(9) NOT NULL, state VARCHAR(40) NOT NULL, city VARCHAR(40) NOT NULL, district VARCHAR(40) NOT NULL, street VARCHAR(80) NOT NULL, number INT NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE partner_company (partner_id INT NOT NULL, company_id INT NOT NULL, PRIMARY KEY(partner_id, company_id))');
        $this->addSql('CREATE INDEX IDX_88556A529393F8FE ON partner_company (partner_id)');
        $this->addSql('CREATE INDEX IDX_88556A52979B1AD6 ON partner_company (company_id)');
        $this->addSql('ALTER TABLE partner_company ADD CONSTRAINT FK_88556A529393F8FE FOREIGN KEY (partner_id) REFERENCES partner (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE partner_company ADD CONSTRAINT FK_88556A52979B1AD6 FOREIGN KEY (company_id) REFERENCES company (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE partner_company DROP CONSTRAINT FK_88556A52979B1AD6');
        $this->addSql('ALTER TABLE partner_company DROP CONSTRAINT FK_88556A529393F8FE');
        $this->addSql('DROP SEQUENCE company_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE partner_id_seq CASCADE');
        $this->addSql('DROP TABLE company');
        $this->addSql('DROP TABLE partner');
        $this->addSql('DROP TABLE partner_company');
    }
}
