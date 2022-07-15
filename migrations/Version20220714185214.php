<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220714185214 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE stagiares');
        $this->addSql('ALTER TABLE equipes ADD nom VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE membres ADD equipe_id INT NOT NULL, ADD chef_id INT NOT NULL, ADD nom VARCHAR(255) NOT NULL, ADD prenom VARCHAR(255) NOT NULL, ADD email VARCHAR(255) NOT NULL, ADD date_deb DATETIME NOT NULL, ADD date_fin DATETIME NOT NULL, ADD niveau_etude VARCHAR(255) DEFAULT NULL, ADD id_chef INT DEFAULT NULL, CHANGE fonction fonction INT DEFAULT NULL');
        $this->addSql('ALTER TABLE membres ADD CONSTRAINT FK_594AE39C6D861B89 FOREIGN KEY (equipe_id) REFERENCES equipes (id)');
        $this->addSql('ALTER TABLE membres ADD CONSTRAINT FK_594AE39C150A48F1 FOREIGN KEY (chef_id) REFERENCES membres (id)');
        $this->addSql('CREATE INDEX IDX_594AE39C6D861B89 ON membres (equipe_id)');
        $this->addSql('CREATE INDEX IDX_594AE39C150A48F1 ON membres (chef_id)');
        $this->addSql('ALTER TABLE offre_stages MODIFY id INT NOT NULL');
        $this->addSql('ALTER TABLE offre_stages DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE offre_stages ADD projet_id INT NOT NULL, DROP id');
        $this->addSql('ALTER TABLE offre_stages ADD CONSTRAINT FK_48280A4FC18272 FOREIGN KEY (projet_id) REFERENCES projets (id)');
        $this->addSql('ALTER TABLE offre_stages ADD PRIMARY KEY (projet_id)');
        $this->addSql('ALTER TABLE projets ADD theme_id INT NOT NULL');
        $this->addSql('ALTER TABLE projets ADD CONSTRAINT FK_B454C1DB59027487 FOREIGN KEY (theme_id) REFERENCES themes (id)');
        $this->addSql('CREATE INDEX IDX_B454C1DB59027487 ON projets (theme_id)');
        $this->addSql('ALTER TABLE realiser_projet DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE realiser_projet ADD idprojet_id INT NOT NULL, ADD idequipe_id INT NOT NULL, DROP id_projet, DROP id_equipe');
        $this->addSql('ALTER TABLE realiser_projet ADD CONSTRAINT FK_7566CBB87EDA2B87 FOREIGN KEY (idprojet_id) REFERENCES projets (id)');
        $this->addSql('ALTER TABLE realiser_projet ADD CONSTRAINT FK_7566CBB8139DB27C FOREIGN KEY (idequipe_id) REFERENCES equipes (id)');
        $this->addSql('CREATE INDEX IDX_7566CBB87EDA2B87 ON realiser_projet (idprojet_id)');
        $this->addSql('CREATE INDEX IDX_7566CBB8139DB27C ON realiser_projet (idequipe_id)');
        $this->addSql('ALTER TABLE realiser_projet ADD PRIMARY KEY (idprojet_id, idequipe_id)');
        $this->addSql('ALTER TABLE themes ADD libelle VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE stagiares (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, prenom VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, date_deb DATETIME NOT NULL, date_fin DATETIME NOT NULL, niveau_etude VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, id_equipe INT DEFAULT NULL, id_chef INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE equipes DROP nom');
        $this->addSql('ALTER TABLE membres DROP FOREIGN KEY FK_594AE39C6D861B89');
        $this->addSql('ALTER TABLE membres DROP FOREIGN KEY FK_594AE39C150A48F1');
        $this->addSql('DROP INDEX IDX_594AE39C6D861B89 ON membres');
        $this->addSql('DROP INDEX IDX_594AE39C150A48F1 ON membres');
        $this->addSql('ALTER TABLE membres DROP equipe_id, DROP chef_id, DROP nom, DROP prenom, DROP email, DROP date_deb, DROP date_fin, DROP niveau_etude, DROP id_chef, CHANGE fonction fonction VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE offre_stages DROP FOREIGN KEY FK_48280A4FC18272');
        $this->addSql('ALTER TABLE offre_stages ADD id INT AUTO_INCREMENT NOT NULL, DROP projet_id, DROP PRIMARY KEY, ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE projets DROP FOREIGN KEY FK_B454C1DB59027487');
        $this->addSql('DROP INDEX IDX_B454C1DB59027487 ON projets');
        $this->addSql('ALTER TABLE projets DROP theme_id');
        $this->addSql('ALTER TABLE realiser_projet DROP FOREIGN KEY FK_7566CBB87EDA2B87');
        $this->addSql('ALTER TABLE realiser_projet DROP FOREIGN KEY FK_7566CBB8139DB27C');
        $this->addSql('DROP INDEX IDX_7566CBB87EDA2B87 ON realiser_projet');
        $this->addSql('DROP INDEX IDX_7566CBB8139DB27C ON realiser_projet');
        $this->addSql('ALTER TABLE realiser_projet DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE realiser_projet ADD id_projet INT NOT NULL, ADD id_equipe INT NOT NULL, DROP idprojet_id, DROP idequipe_id');
        $this->addSql('ALTER TABLE realiser_projet ADD PRIMARY KEY (id_projet, id_equipe)');
        $this->addSql('ALTER TABLE themes DROP libelle');
    }
}
