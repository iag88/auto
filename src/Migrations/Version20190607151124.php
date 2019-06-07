<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190607151124 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE make (`id` INT AUTO_INCREMENT NOT NULL, `code` VARCHAR(190) NOT NULL, `description` VARCHAR(255) NOT NULL, `type` VARCHAR(190) NOT NULL, UNIQUE INDEX UNIQ_1ACC766E1E07D977 (`code`), INDEX idx_make_code (code), INDEX idx_make_type (type), PRIMARY KEY(`id`)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE model (`id` INT AUTO_INCREMENT NOT NULL, `code` VARCHAR(190) NOT NULL, `description` VARCHAR(255) NOT NULL, `type` VARCHAR(190) NOT NULL, `group` VARCHAR(190) NOT NULL, UNIQUE INDEX UNIQ_D79572D91E07D977 (`code`), INDEX idx_model_code (code), INDEX idx_model_type (type), INDEX idx_model_group (`group`), PRIMARY KEY(`id`)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE search_log (id INT AUTO_INCREMENT NOT NULL, vehicle_type VARCHAR(190) DEFAULT NULL, make VARCHAR(190) DEFAULT NULL, number_of_models INT DEFAULT NULL, request_time INT DEFAULT NULL, ip_address VARCHAR(190) DEFAULT NULL, user_agent VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vehicle_type (`id` INT AUTO_INCREMENT NOT NULL, `code` VARCHAR(190) NOT NULL, `description` VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_FE4364751E07D977 (`code`), INDEX idx_code (code), PRIMARY KEY(`id`)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE make');
        $this->addSql('DROP TABLE model');
        $this->addSql('DROP TABLE search_log');
        $this->addSql('DROP TABLE vehicle_type');
    }
}
