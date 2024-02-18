<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240217141645 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE announcement (id INT AUTO_INCREMENT NOT NULL, garage_id INT NOT NULL, picture VARCHAR(255) NOT NULL, title VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, techical_info VARCHAR(255) NOT NULL, brand VARCHAR(255) NOT NULL, price DOUBLE PRECISION NOT NULL, year INT NOT NULL, kilometre INT NOT NULL, fuel VARCHAR(255) NOT NULL, transmission VARCHAR(255) NOT NULL, INDEX IDX_4DB9D91CC4FFF555 (garage_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE announcement_user (announcement_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_A1A2DE15913AEA17 (announcement_id), INDEX IDX_A1A2DE15A76ED395 (user_id), PRIMARY KEY(announcement_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE garage (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, address VARCHAR(255) NOT NULL, postal_code INT NOT NULL, city VARCHAR(255) NOT NULL, phone_number INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE testimony (id INT AUTO_INCREMENT NOT NULL, garage_id INT NOT NULL, name VARCHAR(255) NOT NULL, comment LONGTEXT NOT NULL, note DOUBLE PRECISION NOT NULL, published TINYINT(1) NOT NULL, day_published DATE NOT NULL, INDEX IDX_523C9487C4FFF555 (garage_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE testimony_user (testimony_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_44AE9F01B879FBFE (testimony_id), INDEX IDX_44AE9F01A76ED395 (user_id), PRIMARY KEY(testimony_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE announcement ADD CONSTRAINT FK_4DB9D91CC4FFF555 FOREIGN KEY (garage_id) REFERENCES garage (id)');
        $this->addSql('ALTER TABLE announcement_user ADD CONSTRAINT FK_A1A2DE15913AEA17 FOREIGN KEY (announcement_id) REFERENCES announcement (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE announcement_user ADD CONSTRAINT FK_A1A2DE15A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE testimony ADD CONSTRAINT FK_523C9487C4FFF555 FOREIGN KEY (garage_id) REFERENCES garage (id)');
        $this->addSql('ALTER TABLE testimony_user ADD CONSTRAINT FK_44AE9F01B879FBFE FOREIGN KEY (testimony_id) REFERENCES testimony (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE testimony_user ADD CONSTRAINT FK_44AE9F01A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE schedule ADD garage_id INT NOT NULL');
        $this->addSql('ALTER TABLE schedule ADD CONSTRAINT FK_5A3811FBC4FFF555 FOREIGN KEY (garage_id) REFERENCES garage (id)');
        $this->addSql('CREATE INDEX IDX_5A3811FBC4FFF555 ON schedule (garage_id)');
        $this->addSql('ALTER TABLE service ADD garage_id INT NOT NULL');
        $this->addSql('ALTER TABLE service ADD CONSTRAINT FK_E19D9AD2C4FFF555 FOREIGN KEY (garage_id) REFERENCES garage (id)');
        $this->addSql('CREATE INDEX IDX_E19D9AD2C4FFF555 ON service (garage_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE schedule DROP FOREIGN KEY FK_5A3811FBC4FFF555');
        $this->addSql('ALTER TABLE service DROP FOREIGN KEY FK_E19D9AD2C4FFF555');
        $this->addSql('ALTER TABLE announcement DROP FOREIGN KEY FK_4DB9D91CC4FFF555');
        $this->addSql('ALTER TABLE announcement_user DROP FOREIGN KEY FK_A1A2DE15913AEA17');
        $this->addSql('ALTER TABLE announcement_user DROP FOREIGN KEY FK_A1A2DE15A76ED395');
        $this->addSql('ALTER TABLE testimony DROP FOREIGN KEY FK_523C9487C4FFF555');
        $this->addSql('ALTER TABLE testimony_user DROP FOREIGN KEY FK_44AE9F01B879FBFE');
        $this->addSql('ALTER TABLE testimony_user DROP FOREIGN KEY FK_44AE9F01A76ED395');
        $this->addSql('DROP TABLE announcement');
        $this->addSql('DROP TABLE announcement_user');
        $this->addSql('DROP TABLE garage');
        $this->addSql('DROP TABLE testimony');
        $this->addSql('DROP TABLE testimony_user');
        $this->addSql('DROP INDEX IDX_5A3811FBC4FFF555 ON schedule');
        $this->addSql('ALTER TABLE schedule DROP garage_id');
        $this->addSql('DROP INDEX IDX_E19D9AD2C4FFF555 ON service');
        $this->addSql('ALTER TABLE service DROP garage_id');
    }
}
