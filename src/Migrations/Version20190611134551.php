<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190611134551 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE make (type INT DEFAULT NULL, `id` INT AUTO_INCREMENT NOT NULL, `code` VARCHAR(190) NOT NULL, `description` VARCHAR(255) NOT NULL, INDEX IDX_1ACC766E8CDE5729 (type), INDEX idx_make (type, code), PRIMARY KEY(`id`)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE model (type INT DEFAULT NULL, `groups` INT DEFAULT NULL, `id` INT AUTO_INCREMENT NOT NULL, `code` VARCHAR(190) NOT NULL, `description` VARCHAR(255) NOT NULL, INDEX IDX_D79572D98CDE5729 (type), INDEX IDX_D79572D96DC044C5 (`groups`), INDEX idx_model (type, `groups`, description), PRIMARY KEY(`id`)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE search_log (id INT AUTO_INCREMENT NOT NULL, vehicle_type VARCHAR(190) DEFAULT NULL, make VARCHAR(190) DEFAULT NULL, number_of_models INT DEFAULT NULL, request_time INT DEFAULT NULL, ip_address VARCHAR(190) DEFAULT NULL, user_agent VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vehicle_type (`id` INT AUTO_INCREMENT NOT NULL, `code` VARCHAR(190) NOT NULL, `description` VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_FE4364751E07D977 (`code`), INDEX idx_code (code), PRIMARY KEY(`id`)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE make ADD CONSTRAINT FK_1ACC766E8CDE5729 FOREIGN KEY (type) REFERENCES vehicle_type (id)');
        $this->addSql('ALTER TABLE model ADD CONSTRAINT FK_D79572D98CDE5729 FOREIGN KEY (type) REFERENCES vehicle_type (id)');
        $this->addSql('ALTER TABLE model ADD CONSTRAINT FK_D79572D96DC044C5 FOREIGN KEY (`groups`) REFERENCES make (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE model DROP FOREIGN KEY FK_D79572D96DC044C5');
        $this->addSql('ALTER TABLE make DROP FOREIGN KEY FK_1ACC766E8CDE5729');
        $this->addSql('ALTER TABLE model DROP FOREIGN KEY FK_D79572D98CDE5729');
        $this->addSql('DROP TABLE make');
        $this->addSql('DROP TABLE model');
        $this->addSql('DROP TABLE search_log');
        $this->addSql('DROP TABLE vehicle_type');
    }
}
