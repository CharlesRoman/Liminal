<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190821210919 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE block_translation (id INT AUTO_INCREMENT NOT NULL, translatable_id INT DEFAULT NULL, label VARCHAR(255) NOT NULL, title VARCHAR(255) DEFAULT NULL, description VARCHAR(255) DEFAULT NULL, image VARCHAR(255) DEFAULT NULL, link_label VARCHAR(255) DEFAULT NULL, link_url VARCHAR(255) DEFAULT NULL, locale VARCHAR(255) NOT NULL, INDEX IDX_6E6410B42C2AC5D3 (translatable_id), UNIQUE INDEX block_translation_unique_translation (translatable_id, locale), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE width (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(255) NOT NULL, code VARCHAR(255) NOT NULL, active TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_8C1A452F77153098 (code), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE block (id INT AUTO_INCREMENT NOT NULL, row_id INT DEFAULT NULL, width_id INT DEFAULT NULL, block_type_id INT DEFAULT NULL, rank INT NOT NULL, active TINYINT(1) NOT NULL, deleted_at DATETIME DEFAULT NULL, created_at DATETIME DEFAULT NULL, updated_at DATETIME DEFAULT NULL, INDEX IDX_831B972283A269F2 (row_id), INDEX IDX_831B9722253C865B (width_id), INDEX IDX_831B9722BF6F786D (block_type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE block_translation ADD CONSTRAINT FK_6E6410B42C2AC5D3 FOREIGN KEY (translatable_id) REFERENCES block (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE block ADD CONSTRAINT FK_831B972283A269F2 FOREIGN KEY (row_id) REFERENCES row (id)');
        $this->addSql('ALTER TABLE block ADD CONSTRAINT FK_831B9722253C865B FOREIGN KEY (width_id) REFERENCES width (id)');
        $this->addSql('ALTER TABLE block ADD CONSTRAINT FK_831B9722BF6F786D FOREIGN KEY (block_type_id) REFERENCES block_type (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE block DROP FOREIGN KEY FK_831B9722253C865B');
        $this->addSql('ALTER TABLE block_translation DROP FOREIGN KEY FK_6E6410B42C2AC5D3');
        $this->addSql('DROP TABLE block_translation');
        $this->addSql('DROP TABLE width');
        $this->addSql('DROP TABLE block');
    }
}
