<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230301020230 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE armor (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, def INT NOT NULL, req INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `character` (id INT AUTO_INCREMENT NOT NULL, armor_id INT DEFAULT NULL, weapon_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, lvl INT NOT NULL, exp INT NOT NULL, str INT NOT NULL, skill_points INT NOT NULL, UNIQUE INDEX UNIQ_937AB034F5AA3663 (armor_id), UNIQUE INDEX UNIQ_937AB03495B82273 (weapon_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, player_character_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649910BEE57 (player_character_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE weapon (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, dmg INT NOT NULL, type VARCHAR(255) NOT NULL, req INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE `character` ADD CONSTRAINT FK_937AB034F5AA3663 FOREIGN KEY (armor_id) REFERENCES armor (id)');
        $this->addSql('ALTER TABLE `character` ADD CONSTRAINT FK_937AB03495B82273 FOREIGN KEY (weapon_id) REFERENCES weapon (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649910BEE57 FOREIGN KEY (player_character_id) REFERENCES `character` (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `character` DROP FOREIGN KEY FK_937AB034F5AA3663');
        $this->addSql('ALTER TABLE `character` DROP FOREIGN KEY FK_937AB03495B82273');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649910BEE57');
        $this->addSql('DROP TABLE armor');
        $this->addSql('DROP TABLE `character`');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE weapon');
    }
}
