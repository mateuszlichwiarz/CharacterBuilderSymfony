<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230308011235 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `character` DROP INDEX UNIQ_937AB034F5AA3663, ADD INDEX IDX_937AB034F5AA3663 (armor_id)');
        $this->addSql('ALTER TABLE `character` DROP INDEX UNIQ_937AB03495B82273, ADD INDEX IDX_937AB03495B82273 (weapon_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `character` DROP INDEX IDX_937AB03495B82273, ADD UNIQUE INDEX UNIQ_937AB03495B82273 (weapon_id)');
        $this->addSql('ALTER TABLE `character` DROP INDEX IDX_937AB034F5AA3663, ADD UNIQUE INDEX UNIQ_937AB034F5AA3663 (armor_id)');
    }
}
