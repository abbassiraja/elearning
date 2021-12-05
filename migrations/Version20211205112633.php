<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211205112633 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE ecoles (id INT AUTO_INCREMENT NOT NULL, admin_id INT NOT NULL, nom VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, numero_telephone INT NOT NULL, image VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, lat DOUBLE PRECISION NOT NULL, lon DOUBLE PRECISION NOT NULL, INDEX IDX_C46758A2642B8210 (admin_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE ecoles ADD CONSTRAINT FK_C46758A2642B8210 FOREIGN KEY (admin_id) REFERENCES admin (id)');
        $this->addSql('ALTER TABLE commentaire CHANGE admin_id admin_id INT NOT NULL, CHANGE nomutilisateur nomutilisateur VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE cours CHANGE matiere_id matiere_id INT NOT NULL');
        $this->addSql('ALTER TABLE niveau_scolaire CHANGE description description VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE publicite CHANGE titre titre VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cours DROP FOREIGN KEY FK_FDCA8C9C77EF1B1E');
        $this->addSql('ALTER TABLE niveau_scolaire DROP FOREIGN KEY FK_588167877EF1B1E');
        $this->addSql('ALTER TABLE publicite DROP FOREIGN KEY FK_1D394E3977EF1B1E');
        $this->addSql('DROP TABLE ecoles');
        $this->addSql('ALTER TABLE commentaire CHANGE admin_id admin_id INT DEFAULT NULL, CHANGE nomutilisateur nomutilisateur VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE cours CHANGE matiere_id matiere_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE niveau_scolaire CHANGE description description TEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE publicite CHANGE titre titre VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
