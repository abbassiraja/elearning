<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211123131642 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE cours (id INT AUTO_INCREMENT NOT NULL, matiere_id INT NOT NULL, niveauscolaire_id INT NOT NULL, nom VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, prix DOUBLE PRECISION NOT NULL, reference INT NOT NULL, INDEX IDX_FDCA8C9CF46CD258 (matiere_id), INDEX IDX_FDCA8C9C111E0626 (niveauscolaire_id), FULLTEXT INDEX IDX_FDCA8C9C6C6E55B56DE44026 (nom, description), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE cours ADD CONSTRAINT FK_FDCA8C9CF46CD258 FOREIGN KEY (matiere_id) REFERENCES matieres (id)');
        $this->addSql('ALTER TABLE cours ADD CONSTRAINT FK_FDCA8C9C111E0626 FOREIGN KEY (niveauscolaire_id) REFERENCES niveau_scolaire (id)');
        $this->addSql('ALTER TABLE commentaire CHANGE admin_id admin_id INT NOT NULL, CHANGE nomutilisateur nomutilisateur VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE ecoles CHANGE admin_id admin_id INT NOT NULL, CHANGE email email VARCHAR(255) NOT NULL, CHANGE password password VARCHAR(255) NOT NULL, CHANGE numero_telephone numero_telephone INT NOT NULL');
        $this->addSql('ALTER TABLE niveau_scolaire CHANGE description description VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE publicite CHANGE titre titre VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BCB7942F03');
        $this->addSql('DROP TABLE cours');
        $this->addSql('ALTER TABLE commentaire CHANGE admin_id admin_id INT DEFAULT NULL, CHANGE nomutilisateur nomutilisateur VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE ecoles CHANGE admin_id admin_id INT DEFAULT NULL, CHANGE email email VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE password password VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE numero_telephone numero_telephone INT DEFAULT NULL');
        $this->addSql('ALTER TABLE niveau_scolaire CHANGE description description TEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE publicite CHANGE titre titre VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
