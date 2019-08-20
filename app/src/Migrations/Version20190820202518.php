<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190820202518 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE menu (id INT AUTO_INCREMENT NOT NULL, parent_id INT DEFAULT NULL, rank INT NOT NULL, active TINYINT(1) NOT NULL, deleted_at DATETIME DEFAULT NULL, created_at DATETIME DEFAULT NULL, updated_at DATETIME DEFAULT NULL, INDEX IDX_7D053A93727ACA70 (parent_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE menu_translation (id INT AUTO_INCREMENT NOT NULL, translatable_id INT DEFAULT NULL, label VARCHAR(255) NOT NULL, link VARCHAR(255) DEFAULT NULL, font_awesome_icon VARCHAR(255) DEFAULT NULL, locale VARCHAR(255) NOT NULL, INDEX IDX_DC955B232C2AC5D3 (translatable_id), UNIQUE INDEX menu_translation_unique_translation (translatable_id, locale), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE menu_menu_position (menu_position_id INT NOT NULL, menu_id INT NOT NULL, INDEX IDX_CCBEF4F5B578300A (menu_position_id), INDEX IDX_CCBEF4F5CCD7E912 (menu_id), PRIMARY KEY(menu_position_id, menu_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE universe_translation (id INT AUTO_INCREMENT NOT NULL, translatable_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, logo VARCHAR(255) DEFAULT NULL, banner VARCHAR(255) DEFAULT NULL, description LONGTEXT DEFAULT NULL, locale VARCHAR(255) NOT NULL, INDEX IDX_3135C0472C2AC5D3 (translatable_id), UNIQUE INDEX universe_translation_unique_translation (translatable_id, locale), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE universe (id INT AUTO_INCREMENT NOT NULL, domain VARCHAR(255) NOT NULL, directory VARCHAR(255) NOT NULL, active TINYINT(1) NOT NULL, deleted_at DATETIME DEFAULT NULL, created_at DATETIME DEFAULT NULL, updated_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE menu_universe (universe_id INT NOT NULL, menu_id INT NOT NULL, INDEX IDX_4D647DA35CD9AF2 (universe_id), INDEX IDX_4D647DA3CCD7E912 (menu_id), PRIMARY KEY(universe_id, menu_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE menu ADD CONSTRAINT FK_7D053A93727ACA70 FOREIGN KEY (parent_id) REFERENCES menu (id)');
        $this->addSql('ALTER TABLE menu_translation ADD CONSTRAINT FK_DC955B232C2AC5D3 FOREIGN KEY (translatable_id) REFERENCES menu (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE menu_menu_position ADD CONSTRAINT FK_CCBEF4F5B578300A FOREIGN KEY (menu_position_id) REFERENCES menu_position (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE menu_menu_position ADD CONSTRAINT FK_CCBEF4F5CCD7E912 FOREIGN KEY (menu_id) REFERENCES menu (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE universe_translation ADD CONSTRAINT FK_3135C0472C2AC5D3 FOREIGN KEY (translatable_id) REFERENCES universe (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE menu_universe ADD CONSTRAINT FK_4D647DA35CD9AF2 FOREIGN KEY (universe_id) REFERENCES universe (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE menu_universe ADD CONSTRAINT FK_4D647DA3CCD7E912 FOREIGN KEY (menu_id) REFERENCES menu (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE menu DROP FOREIGN KEY FK_7D053A93727ACA70');
        $this->addSql('ALTER TABLE menu_translation DROP FOREIGN KEY FK_DC955B232C2AC5D3');
        $this->addSql('ALTER TABLE menu_menu_position DROP FOREIGN KEY FK_CCBEF4F5CCD7E912');
        $this->addSql('ALTER TABLE menu_universe DROP FOREIGN KEY FK_4D647DA3CCD7E912');
        $this->addSql('ALTER TABLE universe_translation DROP FOREIGN KEY FK_3135C0472C2AC5D3');
        $this->addSql('ALTER TABLE menu_universe DROP FOREIGN KEY FK_4D647DA35CD9AF2');
        $this->addSql('DROP TABLE menu');
        $this->addSql('DROP TABLE menu_translation');
        $this->addSql('DROP TABLE menu_menu_position');
        $this->addSql('DROP TABLE universe_translation');
        $this->addSql('DROP TABLE universe');
        $this->addSql('DROP TABLE menu_universe');
    }
}
