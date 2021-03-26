<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201210080822 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE etat CHANGE id id CHAR(2) NOT NULL');
        $this->addSql('ALTER TABLE fichefrais CHANGE idUtilisateur idUtilisateur CHAR(4) DEFAULT NULL, CHANGE idEtat idEtat CHAR(2) DEFAULT NULL');
        $this->addSql('ALTER TABLE fraisforfait CHANGE id id CHAR(3) NOT NULL');
        $this->addSql('ALTER TABLE lignefraisforfait CHANGE idFiche idFiche INT DEFAULT NULL, CHANGE idFraisForfait idFraisForfait CHAR(3) DEFAULT NULL');
        $this->addSql('ALTER TABLE lignefraishorsforfait CHANGE idFiche idFiche INT DEFAULT NULL');
        $this->addSql('ALTER TABLE utilisateur ADD lacategory_id INT DEFAULT NULL, CHANGE id id CHAR(4) NOT NULL');
        $this->addSql('ALTER TABLE utilisateur ADD CONSTRAINT FK_1D1C63B3510B294E FOREIGN KEY (lacategory_id) REFERENCES category (id)');
        $this->addSql('CREATE INDEX IDX_1D1C63B3510B294E ON utilisateur (lacategory_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE utilisateur DROP FOREIGN KEY FK_1D1C63B3510B294E');
        $this->addSql('DROP TABLE category');
        $this->addSql('ALTER TABLE etat CHANGE id id CHAR(2) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`');
        $this->addSql('ALTER TABLE fichefrais CHANGE idEtat idEtat CHAR(2) CHARACTER SET latin1 DEFAULT \'CR\' COLLATE `latin1_swedish_ci`, CHANGE idUtilisateur idUtilisateur CHAR(4) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`');
        $this->addSql('ALTER TABLE fraisforfait CHANGE id id CHAR(3) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`');
        $this->addSql('ALTER TABLE lignefraisforfait CHANGE idFraisForfait idFraisForfait CHAR(3) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, CHANGE idFiche idFiche INT NOT NULL');
        $this->addSql('ALTER TABLE lignefraishorsforfait CHANGE idFiche idFiche INT NOT NULL');
        $this->addSql('DROP INDEX IDX_1D1C63B3510B294E ON utilisateur');
        $this->addSql('ALTER TABLE utilisateur DROP lacategory_id, CHANGE id id CHAR(4) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`');
    }
}
