<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20160407140715 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE ratings_to_groups (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, category_id INT NOT NULL, group_id INT NOT NULL, created_by_id INT NOT NULL, updated_by_id INT NOT NULL, mark INT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_F753E7A4A76ED395 (user_id), INDEX IDX_F753E7A412469DE2 (category_id), INDEX IDX_F753E7A4FE54D947 (group_id), INDEX IDX_F753E7A4B03A8386 (created_by_id), INDEX IDX_F753E7A4896DBBDE (updated_by_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ratings_to_categories (id INT AUTO_INCREMENT NOT NULL, sub_category_genre_id INT DEFAULT NULL, created_by_id INT NOT NULL, updated_by_id INT NOT NULL, name VARCHAR(255) NOT NULL, sub_category_country VARCHAR(100) DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_CB73FE42B7F5048E (sub_category_genre_id), INDEX IDX_CB73FE42B03A8386 (created_by_id), INDEX IDX_CB73FE42896DBBDE (updated_by_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE ratings_to_groups ADD CONSTRAINT FK_F753E7A4A76ED395 FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE ratings_to_groups ADD CONSTRAINT FK_F753E7A412469DE2 FOREIGN KEY (category_id) REFERENCES ratings_to_categories (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE ratings_to_groups ADD CONSTRAINT FK_F753E7A4FE54D947 FOREIGN KEY (group_id) REFERENCES groups (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE ratings_to_groups ADD CONSTRAINT FK_F753E7A4B03A8386 FOREIGN KEY (created_by_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE ratings_to_groups ADD CONSTRAINT FK_F753E7A4896DBBDE FOREIGN KEY (updated_by_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE ratings_to_categories ADD CONSTRAINT FK_CB73FE42B7F5048E FOREIGN KEY (sub_category_genre_id) REFERENCES genres (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE ratings_to_categories ADD CONSTRAINT FK_CB73FE42B03A8386 FOREIGN KEY (created_by_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE ratings_to_categories ADD CONSTRAINT FK_CB73FE42896DBBDE FOREIGN KEY (updated_by_id) REFERENCES users (id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE ratings_to_groups DROP FOREIGN KEY FK_F753E7A412469DE2');
        $this->addSql('DROP TABLE ratings_to_groups');
        $this->addSql('DROP TABLE ratings_to_categories');
    }
}
