<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211106184602 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE admin (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commentaire (id INT AUTO_INCREMENT NOT NULL, cour_id INT NOT NULL, user_id INT NOT NULL, admin_id INT NOT NULL, text LONGTEXT NOT NULL, INDEX IDX_67F068BCB7942F03 (cour_id), INDEX IDX_67F068BCA76ED395 (user_id), INDEX IDX_67F068BC642B8210 (admin_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cours (id INT AUTO_INCREMENT NOT NULL, matiere_id INT NOT NULL, niveauscolaire_id INT NOT NULL, ecole_id INT NOT NULL, admin_id INT NOT NULL, panier_id INT NOT NULL, nom VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, prix DOUBLE PRECISION NOT NULL, INDEX IDX_FDCA8C9CF46CD258 (matiere_id), INDEX IDX_FDCA8C9C111E0626 (niveauscolaire_id), INDEX IDX_FDCA8C9C77EF1B1E (ecole_id), INDEX IDX_FDCA8C9C642B8210 (admin_id), INDEX IDX_FDCA8C9CF77D927C (panier_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ecoles (id INT AUTO_INCREMENT NOT NULL, admin_id INT NOT NULL, nom VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, numero_telephone INT NOT NULL, image VARCHAR(255) NOT NULL, INDEX IDX_C46758A2642B8210 (admin_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE evaluation (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, cour_id INT NOT NULL, INDEX IDX_1323A575A76ED395 (user_id), INDEX IDX_1323A575B7942F03 (cour_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE matieres (id INT AUTO_INCREMENT NOT NULL, niveauscolaire_id INT NOT NULL, nom VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, INDEX IDX_8D9773D2111E0626 (niveauscolaire_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE niveau_scolaire (id INT AUTO_INCREMENT NOT NULL, ecole_id INT NOT NULL, nom VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, INDEX IDX_588167877EF1B1E (ecole_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE panier (id INT AUTO_INCREMENT NOT NULL, admin_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_24CC0DF2642B8210 (admin_id), UNIQUE INDEX UNIQ_24CC0DF2A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE publicite (id INT AUTO_INCREMENT NOT NULL, ecole_id INT NOT NULL, admin_id INT NOT NULL, description VARCHAR(255) NOT NULL, INDEX IDX_1D394E3977EF1B1E (ecole_id), INDEX IDX_1D394E39642B8210 (admin_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BCB7942F03 FOREIGN KEY (cour_id) REFERENCES cours (id)');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BCA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BC642B8210 FOREIGN KEY (admin_id) REFERENCES admin (id)');
        $this->addSql('ALTER TABLE cours ADD CONSTRAINT FK_FDCA8C9CF46CD258 FOREIGN KEY (matiere_id) REFERENCES matieres (id)');
        $this->addSql('ALTER TABLE cours ADD CONSTRAINT FK_FDCA8C9C111E0626 FOREIGN KEY (niveauscolaire_id) REFERENCES niveau_scolaire (id)');
        $this->addSql('ALTER TABLE cours ADD CONSTRAINT FK_FDCA8C9C77EF1B1E FOREIGN KEY (ecole_id) REFERENCES ecoles (id)');
        $this->addSql('ALTER TABLE cours ADD CONSTRAINT FK_FDCA8C9C642B8210 FOREIGN KEY (admin_id) REFERENCES admin (id)');
        $this->addSql('ALTER TABLE cours ADD CONSTRAINT FK_FDCA8C9CF77D927C FOREIGN KEY (panier_id) REFERENCES panier (id)');
        $this->addSql('ALTER TABLE ecoles ADD CONSTRAINT FK_C46758A2642B8210 FOREIGN KEY (admin_id) REFERENCES admin (id)');
        $this->addSql('ALTER TABLE evaluation ADD CONSTRAINT FK_1323A575A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE evaluation ADD CONSTRAINT FK_1323A575B7942F03 FOREIGN KEY (cour_id) REFERENCES cours (id)');
        $this->addSql('ALTER TABLE matieres ADD CONSTRAINT FK_8D9773D2111E0626 FOREIGN KEY (niveauscolaire_id) REFERENCES niveau_scolaire (id)');
        $this->addSql('ALTER TABLE niveau_scolaire ADD CONSTRAINT FK_588167877EF1B1E FOREIGN KEY (ecole_id) REFERENCES ecoles (id)');
        $this->addSql('ALTER TABLE panier ADD CONSTRAINT FK_24CC0DF2642B8210 FOREIGN KEY (admin_id) REFERENCES admin (id)');
        $this->addSql('ALTER TABLE panier ADD CONSTRAINT FK_24CC0DF2A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE publicite ADD CONSTRAINT FK_1D394E3977EF1B1E FOREIGN KEY (ecole_id) REFERENCES ecoles (id)');
        $this->addSql('ALTER TABLE publicite ADD CONSTRAINT FK_1D394E39642B8210 FOREIGN KEY (admin_id) REFERENCES admin (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BC642B8210');
        $this->addSql('ALTER TABLE cours DROP FOREIGN KEY FK_FDCA8C9C642B8210');
        $this->addSql('ALTER TABLE ecoles DROP FOREIGN KEY FK_C46758A2642B8210');
        $this->addSql('ALTER TABLE panier DROP FOREIGN KEY FK_24CC0DF2642B8210');
        $this->addSql('ALTER TABLE publicite DROP FOREIGN KEY FK_1D394E39642B8210');
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BCB7942F03');
        $this->addSql('ALTER TABLE evaluation DROP FOREIGN KEY FK_1323A575B7942F03');
        $this->addSql('ALTER TABLE cours DROP FOREIGN KEY FK_FDCA8C9C77EF1B1E');
        $this->addSql('ALTER TABLE niveau_scolaire DROP FOREIGN KEY FK_588167877EF1B1E');
        $this->addSql('ALTER TABLE publicite DROP FOREIGN KEY FK_1D394E3977EF1B1E');
        $this->addSql('ALTER TABLE cours DROP FOREIGN KEY FK_FDCA8C9CF46CD258');
        $this->addSql('ALTER TABLE cours DROP FOREIGN KEY FK_FDCA8C9C111E0626');
        $this->addSql('ALTER TABLE matieres DROP FOREIGN KEY FK_8D9773D2111E0626');
        $this->addSql('ALTER TABLE cours DROP FOREIGN KEY FK_FDCA8C9CF77D927C');
        $this->addSql('DROP TABLE admin');
        $this->addSql('DROP TABLE commentaire');
        $this->addSql('DROP TABLE cours');
        $this->addSql('DROP TABLE ecoles');
        $this->addSql('DROP TABLE evaluation');
        $this->addSql('DROP TABLE matieres');
        $this->addSql('DROP TABLE niveau_scolaire');
        $this->addSql('DROP TABLE panier');
        $this->addSql('DROP TABLE publicite');
    }
}
