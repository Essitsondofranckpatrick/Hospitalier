<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220714224125 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE realiser_projet DROP FOREIGN KEY FK_7566CBB87EDA2B87');
        $this->addSql('ALTER TABLE realiser_projet DROP FOREIGN KEY FK_7566CBB8139DB27C');
        $this->addSql('DROP INDEX IDX_7566CBB87EDA2B87 ON realiser_projet');
        $this->addSql('DROP INDEX IDX_7566CBB8139DB27C ON realiser_projet');
        $this->addSql('ALTER TABLE realiser_projet DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE realiser_projet ADD projet_id INT NOT NULL, ADD equipe_id INT NOT NULL, DROP idprojet_id, DROP idequipe_id');
        $this->addSql('ALTER TABLE realiser_projet ADD CONSTRAINT FK_7566CBB8C18272 FOREIGN KEY (projet_id) REFERENCES projets (id)');
        $this->addSql('ALTER TABLE realiser_projet ADD CONSTRAINT FK_7566CBB86D861B89 FOREIGN KEY (equipe_id) REFERENCES equipes (id)');
        $this->addSql('CREATE INDEX IDX_7566CBB8C18272 ON realiser_projet (projet_id)');
        $this->addSql('CREATE INDEX IDX_7566CBB86D861B89 ON realiser_projet (equipe_id)');
        $this->addSql('ALTER TABLE realiser_projet ADD PRIMARY KEY (projet_id, equipe_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE realiser_projet DROP FOREIGN KEY FK_7566CBB8C18272');
        $this->addSql('ALTER TABLE realiser_projet DROP FOREIGN KEY FK_7566CBB86D861B89');
        $this->addSql('DROP INDEX IDX_7566CBB8C18272 ON realiser_projet');
        $this->addSql('DROP INDEX IDX_7566CBB86D861B89 ON realiser_projet');
        $this->addSql('ALTER TABLE realiser_projet DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE realiser_projet ADD idprojet_id INT NOT NULL, ADD idequipe_id INT NOT NULL, DROP projet_id, DROP equipe_id');
        $this->addSql('ALTER TABLE realiser_projet ADD CONSTRAINT FK_7566CBB87EDA2B87 FOREIGN KEY (idprojet_id) REFERENCES projets (id)');
        $this->addSql('ALTER TABLE realiser_projet ADD CONSTRAINT FK_7566CBB8139DB27C FOREIGN KEY (idequipe_id) REFERENCES equipes (id)');
        $this->addSql('CREATE INDEX IDX_7566CBB87EDA2B87 ON realiser_projet (idprojet_id)');
        $this->addSql('CREATE INDEX IDX_7566CBB8139DB27C ON realiser_projet (idequipe_id)');
        $this->addSql('ALTER TABLE realiser_projet ADD PRIMARY KEY (idprojet_id, idequipe_id)');
    }
}
