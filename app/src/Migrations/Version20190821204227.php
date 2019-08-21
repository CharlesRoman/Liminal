<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190821204227 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE row (id INT AUTO_INCREMENT NOT NULL, page_id INT DEFAULT NULL, row_type_id INT DEFAULT NULL, background_color VARCHAR(255) DEFAULT NULL, rank INT NOT NULL, active TINYINT(1) NOT NULL, deleted_at DATETIME DEFAULT NULL, created_at DATETIME DEFAULT NULL, updated_at DATETIME DEFAULT NULL, INDEX IDX_8430F6DBC4663E4 (page_id), INDEX IDX_8430F6DBADC119B8 (row_type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE row_translation (id INT AUTO_INCREMENT NOT NULL, translatable_id INT DEFAULT NULL, title VARCHAR(255) DEFAULT NULL, background_image VARCHAR(255) DEFAULT NULL, locale VARCHAR(255) NOT NULL, INDEX IDX_F5C618272C2AC5D3 (translatable_id), UNIQUE INDEX row_translation_unique_translation (translatable_id, locale), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE row ADD CONSTRAINT FK_8430F6DBC4663E4 FOREIGN KEY (page_id) REFERENCES page (id)');
        $this->addSql('ALTER TABLE row ADD CONSTRAINT FK_8430F6DBADC119B8 FOREIGN KEY (row_type_id) REFERENCES row_type (id)');
        $this->addSql('ALTER TABLE row_translation ADD CONSTRAINT FK_F5C618272C2AC5D3 FOREIGN KEY (translatable_id) REFERENCES row (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE row_translation DROP FOREIGN KEY FK_F5C618272C2AC5D3');
        $this->addSql('DROP TABLE row');
        $this->addSql('DROP TABLE row_translation');
    }
}
