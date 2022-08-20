<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220727220657 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE projects ADD achieved TINYINT(1) DEFAULT NULL, DROP etat');
        $this->addSql('ALTER TABLE users DROP role, DROP achieved');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE projects ADD etat VARCHAR(255) DEFAULT NULL, DROP achieved');
        $this->addSql('ALTER TABLE users ADD role VARCHAR(255) DEFAULT NULL, ADD achieved TINYINT(1) DEFAULT NULL');
    }
}
