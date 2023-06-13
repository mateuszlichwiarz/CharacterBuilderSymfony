<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230613001909 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE combat (id INT AUTO_INCREMENT NOT NULL, attacker_id INT NOT NULL, defender_id INT NOT NULL, winner_id INT NOT NULL, course LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', date DATETIME NOT NULL, INDEX IDX_8D51E39865F8CAE3 (attacker_id), INDEX IDX_8D51E3984A3E3B6F (defender_id), INDEX IDX_8D51E3985DFCD4B8 (winner_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE quest (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, time_length VARCHAR(255) NOT NULL COMMENT \'(DC2Type:dateinterval)\', description VARCHAR(255) NOT NULL, expirience INT NOT NULL, reward INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tour (id INT AUTO_INCREMENT NOT NULL, player_character_id INT NOT NULL, quest_id INT NOT NULL, start_date DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', finish_date DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_6AD1F969910BEE57 (player_character_id), INDEX IDX_6AD1F969209E9EF4 (quest_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE combat ADD CONSTRAINT FK_8D51E39865F8CAE3 FOREIGN KEY (attacker_id) REFERENCES `character` (id)');
        $this->addSql('ALTER TABLE combat ADD CONSTRAINT FK_8D51E3984A3E3B6F FOREIGN KEY (defender_id) REFERENCES `character` (id)');
        $this->addSql('ALTER TABLE combat ADD CONSTRAINT FK_8D51E3985DFCD4B8 FOREIGN KEY (winner_id) REFERENCES `character` (id)');
        $this->addSql('ALTER TABLE tour ADD CONSTRAINT FK_6AD1F969910BEE57 FOREIGN KEY (player_character_id) REFERENCES `character` (id)');
        $this->addSql('ALTER TABLE tour ADD CONSTRAINT FK_6AD1F969209E9EF4 FOREIGN KEY (quest_id) REFERENCES quest (id)');
        $this->addSql('ALTER TABLE `character` ADD dex INT NOT NULL, ADD wis INT NOT NULL, ADD hp INT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE combat DROP FOREIGN KEY FK_8D51E39865F8CAE3');
        $this->addSql('ALTER TABLE combat DROP FOREIGN KEY FK_8D51E3984A3E3B6F');
        $this->addSql('ALTER TABLE combat DROP FOREIGN KEY FK_8D51E3985DFCD4B8');
        $this->addSql('ALTER TABLE tour DROP FOREIGN KEY FK_6AD1F969910BEE57');
        $this->addSql('ALTER TABLE tour DROP FOREIGN KEY FK_6AD1F969209E9EF4');
        $this->addSql('DROP TABLE combat');
        $this->addSql('DROP TABLE quest');
        $this->addSql('DROP TABLE tour');
        $this->addSql('ALTER TABLE `character` DROP dex, DROP wis, DROP hp');
    }
}
