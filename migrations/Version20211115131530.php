<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211115131530 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE publicite (id INT AUTO_INCREMENT NOT NULL, ecole_id INT NOT NULL, titre VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, INDEX IDX_1D394E3977EF1B1E (ecole_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE publicite ADD CONSTRAINT FK_1D394E3977EF1B1E FOREIGN KEY (ecole_id) REFERENCES ecoles (id)');
        $this->addSql('ALTER TABLE commentaire CHANGE admin_id admin_id INT NOT NULL, CHANGE nomutilisateur nomutilisateur VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE ecoles CHANGE admin_id admin_id INT NOT NULL, CHANGE email email VARCHAR(255) NOT NULL, CHANGE password password VARCHAR(255) NOT NULL, CHANGE numero_telephone numero_telephone INT NOT NULL');
        $this->addSql('ALTER TABLE niveau_scolaire CHANGE description description VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE publicite');
        $this->addSql('ALTER TABLE commentaire CHANGE admin_id admin_id INT DEFAULT NULL, CHANGE nomutilisateur nomutilisateur VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE ecoles CHANGE admin_id admin_id INT DEFAULT NULL, CHANGE email email VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE password password VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE numero_telephone numero_telephone INT DEFAULT NULL');
        $this->addSql('ALTER TABLE niveau_scolaire CHANGE description description TEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
