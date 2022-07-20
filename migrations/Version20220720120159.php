<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220720120159 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE achieved_projects (id INT AUTO_INCREMENT NOT NULL, projects_id INT NOT NULL, users_id INT NOT NULL, duree INT DEFAULT NULL, INDEX IDX_37679CCB1EDE0F55 (projects_id), INDEX IDX_37679CCB67B3B43D (users_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE interactions (id INT AUTO_INCREMENT NOT NULL, users_id INT NOT NULL, message VARCHAR(255) DEFAULT NULL, type VARCHAR(255) DEFAULT NULL, INDEX IDX_538B74BD67B3B43D (users_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE projects (id INT AUTO_INCREMENT NOT NULL, themes_id INT DEFAULT NULL, ref VARCHAR(255) DEFAULT NULL, nom VARCHAR(255) DEFAULT NULL, description VARCHAR(255) DEFAULT NULL, duree_estimee INT DEFAULT NULL, offre_stage TINYINT(1) DEFAULT NULL, effectif INT DEFAULT NULL, etat VARCHAR(255) DEFAULT NULL, INDEX IDX_5C93B3A494F4A9D2 (themes_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE themes (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, libelle VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) DEFAULT NULL, prenom VARCHAR(255) DEFAULT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, role VARCHAR(255) DEFAULT NULL, diplome VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE achieved_projects ADD CONSTRAINT FK_37679CCB1EDE0F55 FOREIGN KEY (projects_id) REFERENCES projects (id)');
        $this->addSql('ALTER TABLE achieved_projects ADD CONSTRAINT FK_37679CCB67B3B43D FOREIGN KEY (users_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE interactions ADD CONSTRAINT FK_538B74BD67B3B43D FOREIGN KEY (users_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE projects ADD CONSTRAINT FK_5C93B3A494F4A9D2 FOREIGN KEY (themes_id) REFERENCES themes (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE achieved_projects DROP FOREIGN KEY FK_37679CCB1EDE0F55');
        $this->addSql('ALTER TABLE projects DROP FOREIGN KEY FK_5C93B3A494F4A9D2');
        $this->addSql('ALTER TABLE achieved_projects DROP FOREIGN KEY FK_37679CCB67B3B43D');
        $this->addSql('ALTER TABLE interactions DROP FOREIGN KEY FK_538B74BD67B3B43D');
        $this->addSql('DROP TABLE achieved_projects');
        $this->addSql('DROP TABLE interactions');
        $this->addSql('DROP TABLE projects');
        $this->addSql('DROP TABLE themes');
        $this->addSql('DROP TABLE users');
    }
}
