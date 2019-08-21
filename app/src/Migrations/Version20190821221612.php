<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190821221612 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE block_type (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(255) NOT NULL, code VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_4AB0055277153098 (code), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE row (id INT AUTO_INCREMENT NOT NULL, page_id INT DEFAULT NULL, row_type_id INT DEFAULT NULL, background_color VARCHAR(255) DEFAULT NULL, rank INT NOT NULL, active TINYINT(1) NOT NULL, deleted_at DATETIME DEFAULT NULL, created_at DATETIME DEFAULT NULL, updated_at DATETIME DEFAULT NULL, INDEX IDX_8430F6DBC4663E4 (page_id), INDEX IDX_8430F6DBADC119B8 (row_type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE page_translation (id INT AUTO_INCREMENT NOT NULL, translatable_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, url VARCHAR(255) NOT NULL, title VARCHAR(255) DEFAULT NULL, header LONGTEXT DEFAULT NULL, description LONGTEXT DEFAULT NULL, locale VARCHAR(255) NOT NULL, INDEX IDX_A3D51B1D2C2AC5D3 (translatable_id), UNIQUE INDEX UNIQ_A3D51B1DF47645AE4180C698 (url, locale), UNIQUE INDEX page_translation_unique_translation (translatable_id, locale), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE page_type (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(255) NOT NULL, code VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_B1A4BF377153098 (code), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE row_translation (id INT AUTO_INCREMENT NOT NULL, translatable_id INT DEFAULT NULL, title VARCHAR(255) DEFAULT NULL, background_image VARCHAR(255) DEFAULT NULL, locale VARCHAR(255) NOT NULL, INDEX IDX_F5C618272C2AC5D3 (translatable_id), UNIQUE INDEX row_translation_unique_translation (translatable_id, locale), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE row_type (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(255) NOT NULL, code VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_F75798DE77153098 (code), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE block_translation (id INT AUTO_INCREMENT NOT NULL, translatable_id INT DEFAULT NULL, label VARCHAR(255) NOT NULL, title VARCHAR(255) DEFAULT NULL, description VARCHAR(255) DEFAULT NULL, image VARCHAR(255) DEFAULT NULL, link_label VARCHAR(255) DEFAULT NULL, link_url VARCHAR(255) DEFAULT NULL, locale VARCHAR(255) NOT NULL, INDEX IDX_6E6410B42C2AC5D3 (translatable_id), UNIQUE INDEX block_translation_unique_translation (translatable_id, locale), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE width (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(255) NOT NULL, code VARCHAR(255) NOT NULL, active TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_8C1A452F77153098 (code), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE block (id INT AUTO_INCREMENT NOT NULL, row_id INT DEFAULT NULL, width_id INT DEFAULT NULL, block_type_id INT DEFAULT NULL, rank INT NOT NULL, active TINYINT(1) NOT NULL, deleted_at DATETIME DEFAULT NULL, created_at DATETIME DEFAULT NULL, updated_at DATETIME DEFAULT NULL, INDEX IDX_831B972283A269F2 (row_id), INDEX IDX_831B9722253C865B (width_id), INDEX IDX_831B9722BF6F786D (block_type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE page (id INT AUTO_INCREMENT NOT NULL, page_type_id INT DEFAULT NULL, user_id INT DEFAULT NULL, category_id INT DEFAULT NULL, rank INT NOT NULL, active TINYINT(1) NOT NULL, deleted_at DATETIME DEFAULT NULL, created_at DATETIME DEFAULT NULL, updated_at DATETIME DEFAULT NULL, INDEX IDX_140AB6203F2C6706 (page_type_id), INDEX IDX_140AB620A76ED395 (user_id), INDEX IDX_140AB62012469DE2 (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE abstract_sorting (id INT AUTO_INCREMENT NOT NULL, parent_id INT DEFAULT NULL, rank INT NOT NULL, active TINYINT(1) NOT NULL, deleted_at DATETIME DEFAULT NULL, created_at DATETIME DEFAULT NULL, updated_at DATETIME DEFAULT NULL, discr VARCHAR(255) NOT NULL, INDEX IDX_131808CE727ACA70 (parent_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE selection (id INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE page_selection (selection_id INT NOT NULL, page_id INT NOT NULL, INDEX IDX_AD4BB318E48EFE78 (selection_id), INDEX IDX_AD4BB318C4663E4 (page_id), PRIMARY KEY(selection_id, page_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE category (id INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE abstract_sorting_translation (id INT AUTO_INCREMENT NOT NULL, translatable_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, title VARCHAR(255) DEFAULT NULL, description LONGTEXT DEFAULT NULL, image VARCHAR(255) DEFAULT NULL, locale VARCHAR(255) NOT NULL, INDEX IDX_48B6A2722C2AC5D3 (translatable_id), UNIQUE INDEX abstract_sorting_translation_unique_translation (translatable_id, locale), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE post (id INT AUTO_INCREMENT NOT NULL, string VARCHAR(255) NOT NULL, deleted_at DATETIME DEFAULT NULL, created_at DATETIME DEFAULT NULL, updated_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE menu (id INT AUTO_INCREMENT NOT NULL, parent_id INT DEFAULT NULL, rank INT NOT NULL, active TINYINT(1) NOT NULL, deleted_at DATETIME DEFAULT NULL, created_at DATETIME DEFAULT NULL, updated_at DATETIME DEFAULT NULL, INDEX IDX_7D053A93727ACA70 (parent_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE menu_translation (id INT AUTO_INCREMENT NOT NULL, translatable_id INT DEFAULT NULL, label VARCHAR(255) NOT NULL, link VARCHAR(255) DEFAULT NULL, font_awesome_icon VARCHAR(255) DEFAULT NULL, locale VARCHAR(255) NOT NULL, INDEX IDX_DC955B232C2AC5D3 (translatable_id), UNIQUE INDEX menu_translation_unique_translation (translatable_id, locale), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE menu_position (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(255) NOT NULL, active TINYINT(1) NOT NULL, rank INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE menu_menu_position (menu_position_id INT NOT NULL, menu_id INT NOT NULL, INDEX IDX_CCBEF4F5B578300A (menu_position_id), INDEX IDX_CCBEF4F5CCD7E912 (menu_id), PRIMARY KEY(menu_position_id, menu_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE universe_translation (id INT AUTO_INCREMENT NOT NULL, translatable_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, logo VARCHAR(255) DEFAULT NULL, banner VARCHAR(255) DEFAULT NULL, description LONGTEXT DEFAULT NULL, locale VARCHAR(255) NOT NULL, INDEX IDX_3135C0472C2AC5D3 (translatable_id), UNIQUE INDEX universe_translation_unique_translation (translatable_id, locale), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE universe (id INT AUTO_INCREMENT NOT NULL, domain VARCHAR(255) NOT NULL, directory VARCHAR(255) NOT NULL, active TINYINT(1) NOT NULL, deleted_at DATETIME DEFAULT NULL, created_at DATETIME DEFAULT NULL, updated_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE menu_universe (universe_id INT NOT NULL, menu_id INT NOT NULL, INDEX IDX_4D647DA35CD9AF2 (universe_id), INDEX IDX_4D647DA3CCD7E912 (menu_id), PRIMARY KEY(universe_id, menu_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_universe (universe_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_81B8DC355CD9AF2 (universe_id), INDEX IDX_81B8DC35A76ED395 (user_id), PRIMARY KEY(universe_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE page_universe (universe_id INT NOT NULL, page_id INT NOT NULL, INDEX IDX_E1AA3F155CD9AF2 (universe_id), INDEX IDX_E1AA3F15C4663E4 (page_id), PRIMARY KEY(universe_id, page_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE category_universe (universe_id INT NOT NULL, category_id INT NOT NULL, INDEX IDX_D64FBC4E5CD9AF2 (universe_id), INDEX IDX_D64FBC4E12469DE2 (category_id), PRIMARY KEY(universe_id, category_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE selection_universe (universe_id INT NOT NULL, selection_id INT NOT NULL, INDEX IDX_B6904D7D5CD9AF2 (universe_id), INDEX IDX_B6904D7DE48EFE78 (selection_id), PRIMARY KEY(universe_id, selection_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, login VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:simple_array)\', deleted_at DATETIME DEFAULT NULL, created_at DATETIME DEFAULT NULL, updated_at DATETIME DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D649AA08CB10 (login), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE row ADD CONSTRAINT FK_8430F6DBC4663E4 FOREIGN KEY (page_id) REFERENCES page (id)');
        $this->addSql('ALTER TABLE row ADD CONSTRAINT FK_8430F6DBADC119B8 FOREIGN KEY (row_type_id) REFERENCES row_type (id)');
        $this->addSql('ALTER TABLE page_translation ADD CONSTRAINT FK_A3D51B1D2C2AC5D3 FOREIGN KEY (translatable_id) REFERENCES page (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE row_translation ADD CONSTRAINT FK_F5C618272C2AC5D3 FOREIGN KEY (translatable_id) REFERENCES row (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE block_translation ADD CONSTRAINT FK_6E6410B42C2AC5D3 FOREIGN KEY (translatable_id) REFERENCES block (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE block ADD CONSTRAINT FK_831B972283A269F2 FOREIGN KEY (row_id) REFERENCES row (id)');
        $this->addSql('ALTER TABLE block ADD CONSTRAINT FK_831B9722253C865B FOREIGN KEY (width_id) REFERENCES width (id)');
        $this->addSql('ALTER TABLE block ADD CONSTRAINT FK_831B9722BF6F786D FOREIGN KEY (block_type_id) REFERENCES block_type (id)');
        $this->addSql('ALTER TABLE page ADD CONSTRAINT FK_140AB6203F2C6706 FOREIGN KEY (page_type_id) REFERENCES page_type (id)');
        $this->addSql('ALTER TABLE page ADD CONSTRAINT FK_140AB620A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE page ADD CONSTRAINT FK_140AB62012469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE abstract_sorting ADD CONSTRAINT FK_131808CE727ACA70 FOREIGN KEY (parent_id) REFERENCES abstract_sorting (id)');
        $this->addSql('ALTER TABLE selection ADD CONSTRAINT FK_96A50CD7BF396750 FOREIGN KEY (id) REFERENCES abstract_sorting (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE page_selection ADD CONSTRAINT FK_AD4BB318E48EFE78 FOREIGN KEY (selection_id) REFERENCES selection (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE page_selection ADD CONSTRAINT FK_AD4BB318C4663E4 FOREIGN KEY (page_id) REFERENCES page (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE category ADD CONSTRAINT FK_64C19C1BF396750 FOREIGN KEY (id) REFERENCES abstract_sorting (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE abstract_sorting_translation ADD CONSTRAINT FK_48B6A2722C2AC5D3 FOREIGN KEY (translatable_id) REFERENCES abstract_sorting (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE menu ADD CONSTRAINT FK_7D053A93727ACA70 FOREIGN KEY (parent_id) REFERENCES menu (id)');
        $this->addSql('ALTER TABLE menu_translation ADD CONSTRAINT FK_DC955B232C2AC5D3 FOREIGN KEY (translatable_id) REFERENCES menu (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE menu_menu_position ADD CONSTRAINT FK_CCBEF4F5B578300A FOREIGN KEY (menu_position_id) REFERENCES menu_position (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE menu_menu_position ADD CONSTRAINT FK_CCBEF4F5CCD7E912 FOREIGN KEY (menu_id) REFERENCES menu (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE universe_translation ADD CONSTRAINT FK_3135C0472C2AC5D3 FOREIGN KEY (translatable_id) REFERENCES universe (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE menu_universe ADD CONSTRAINT FK_4D647DA35CD9AF2 FOREIGN KEY (universe_id) REFERENCES universe (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE menu_universe ADD CONSTRAINT FK_4D647DA3CCD7E912 FOREIGN KEY (menu_id) REFERENCES menu (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_universe ADD CONSTRAINT FK_81B8DC355CD9AF2 FOREIGN KEY (universe_id) REFERENCES universe (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_universe ADD CONSTRAINT FK_81B8DC35A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE page_universe ADD CONSTRAINT FK_E1AA3F155CD9AF2 FOREIGN KEY (universe_id) REFERENCES universe (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE page_universe ADD CONSTRAINT FK_E1AA3F15C4663E4 FOREIGN KEY (page_id) REFERENCES page (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE category_universe ADD CONSTRAINT FK_D64FBC4E5CD9AF2 FOREIGN KEY (universe_id) REFERENCES universe (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE category_universe ADD CONSTRAINT FK_D64FBC4E12469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE selection_universe ADD CONSTRAINT FK_B6904D7D5CD9AF2 FOREIGN KEY (universe_id) REFERENCES universe (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE selection_universe ADD CONSTRAINT FK_B6904D7DE48EFE78 FOREIGN KEY (selection_id) REFERENCES selection (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE block DROP FOREIGN KEY FK_831B9722BF6F786D');
        $this->addSql('ALTER TABLE row_translation DROP FOREIGN KEY FK_F5C618272C2AC5D3');
        $this->addSql('ALTER TABLE block DROP FOREIGN KEY FK_831B972283A269F2');
        $this->addSql('ALTER TABLE page DROP FOREIGN KEY FK_140AB6203F2C6706');
        $this->addSql('ALTER TABLE row DROP FOREIGN KEY FK_8430F6DBADC119B8');
        $this->addSql('ALTER TABLE block DROP FOREIGN KEY FK_831B9722253C865B');
        $this->addSql('ALTER TABLE block_translation DROP FOREIGN KEY FK_6E6410B42C2AC5D3');
        $this->addSql('ALTER TABLE row DROP FOREIGN KEY FK_8430F6DBC4663E4');
        $this->addSql('ALTER TABLE page_translation DROP FOREIGN KEY FK_A3D51B1D2C2AC5D3');
        $this->addSql('ALTER TABLE page_selection DROP FOREIGN KEY FK_AD4BB318C4663E4');
        $this->addSql('ALTER TABLE page_universe DROP FOREIGN KEY FK_E1AA3F15C4663E4');
        $this->addSql('ALTER TABLE abstract_sorting DROP FOREIGN KEY FK_131808CE727ACA70');
        $this->addSql('ALTER TABLE selection DROP FOREIGN KEY FK_96A50CD7BF396750');
        $this->addSql('ALTER TABLE category DROP FOREIGN KEY FK_64C19C1BF396750');
        $this->addSql('ALTER TABLE abstract_sorting_translation DROP FOREIGN KEY FK_48B6A2722C2AC5D3');
        $this->addSql('ALTER TABLE page_selection DROP FOREIGN KEY FK_AD4BB318E48EFE78');
        $this->addSql('ALTER TABLE selection_universe DROP FOREIGN KEY FK_B6904D7DE48EFE78');
        $this->addSql('ALTER TABLE page DROP FOREIGN KEY FK_140AB62012469DE2');
        $this->addSql('ALTER TABLE category_universe DROP FOREIGN KEY FK_D64FBC4E12469DE2');
        $this->addSql('ALTER TABLE menu DROP FOREIGN KEY FK_7D053A93727ACA70');
        $this->addSql('ALTER TABLE menu_translation DROP FOREIGN KEY FK_DC955B232C2AC5D3');
        $this->addSql('ALTER TABLE menu_menu_position DROP FOREIGN KEY FK_CCBEF4F5CCD7E912');
        $this->addSql('ALTER TABLE menu_universe DROP FOREIGN KEY FK_4D647DA3CCD7E912');
        $this->addSql('ALTER TABLE menu_menu_position DROP FOREIGN KEY FK_CCBEF4F5B578300A');
        $this->addSql('ALTER TABLE universe_translation DROP FOREIGN KEY FK_3135C0472C2AC5D3');
        $this->addSql('ALTER TABLE menu_universe DROP FOREIGN KEY FK_4D647DA35CD9AF2');
        $this->addSql('ALTER TABLE user_universe DROP FOREIGN KEY FK_81B8DC355CD9AF2');
        $this->addSql('ALTER TABLE page_universe DROP FOREIGN KEY FK_E1AA3F155CD9AF2');
        $this->addSql('ALTER TABLE category_universe DROP FOREIGN KEY FK_D64FBC4E5CD9AF2');
        $this->addSql('ALTER TABLE selection_universe DROP FOREIGN KEY FK_B6904D7D5CD9AF2');
        $this->addSql('ALTER TABLE page DROP FOREIGN KEY FK_140AB620A76ED395');
        $this->addSql('ALTER TABLE user_universe DROP FOREIGN KEY FK_81B8DC35A76ED395');
        $this->addSql('DROP TABLE block_type');
        $this->addSql('DROP TABLE row');
        $this->addSql('DROP TABLE page_translation');
        $this->addSql('DROP TABLE page_type');
        $this->addSql('DROP TABLE row_translation');
        $this->addSql('DROP TABLE row_type');
        $this->addSql('DROP TABLE block_translation');
        $this->addSql('DROP TABLE width');
        $this->addSql('DROP TABLE block');
        $this->addSql('DROP TABLE page');
        $this->addSql('DROP TABLE abstract_sorting');
        $this->addSql('DROP TABLE selection');
        $this->addSql('DROP TABLE page_selection');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE abstract_sorting_translation');
        $this->addSql('DROP TABLE post');
        $this->addSql('DROP TABLE menu');
        $this->addSql('DROP TABLE menu_translation');
        $this->addSql('DROP TABLE menu_position');
        $this->addSql('DROP TABLE menu_menu_position');
        $this->addSql('DROP TABLE universe_translation');
        $this->addSql('DROP TABLE universe');
        $this->addSql('DROP TABLE menu_universe');
        $this->addSql('DROP TABLE user_universe');
        $this->addSql('DROP TABLE page_universe');
        $this->addSql('DROP TABLE category_universe');
        $this->addSql('DROP TABLE selection_universe');
        $this->addSql('DROP TABLE user');
    }
}
