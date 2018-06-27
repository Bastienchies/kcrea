<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180627112130 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE acteur (id INT AUTO_INCREMENT NOT NULL, nom_acteur VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE compo_groupe (id INT AUTO_INCREMENT NOT NULL, id_utilisateur_id INT NOT NULL, id_typeuser_id INT NOT NULL, id_groupe_id INT NOT NULL, INDEX IDX_5AA250B7C6EE5C49 (id_utilisateur_id), INDEX IDX_5AA250B7659892D9 (id_typeuser_id), INDEX IDX_5AA250B7FA7089AB (id_groupe_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE etat_visionnage (id INT AUTO_INCREMENT NOT NULL, libelle_visionnage VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE groupe_utilisateur (id INT AUTO_INCREMENT NOT NULL, nom_groupe VARCHAR(255) NOT NULL, image_groupe VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE titre (id INT AUTO_INCREMENT NOT NULL, libelle_titre VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE titre_identite (id INT AUTO_INCREMENT NOT NULL, id_user_id INT NOT NULL, note INT NOT NULL, avis VARCHAR(255) NOT NULL, INDEX IDX_AB8FEFE779F37AE5 (id_user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_utilisateur_groupe (id INT AUTO_INCREMENT NOT NULL, libelle_typeutilisateur VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utilisateur (id_utilisateur INT AUTO_INCREMENT NOT NULL, nom_utilisateur VARCHAR(255) NOT NULL, prenom_utilisateur VARCHAR(255) NOT NULL, password_utilisateur VARCHAR(255) NOT NULL, email_utilisateur VARCHAR(255) NOT NULL, avatar_utilisateur VARCHAR(255) NOT NULL, PRIMARY KEY(id_utilisateur)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE compo_groupe ADD CONSTRAINT FK_5AA250B7C6EE5C49 FOREIGN KEY (id_utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE compo_groupe ADD CONSTRAINT FK_5AA250B7659892D9 FOREIGN KEY (id_typeuser_id) REFERENCES type_utilisateur_groupe (id)');
        $this->addSql('ALTER TABLE compo_groupe ADD CONSTRAINT FK_5AA250B7FA7089AB FOREIGN KEY (id_groupe_id) REFERENCES groupe_utilisateur (id)');
        $this->addSql('ALTER TABLE titre_identite ADD CONSTRAINT FK_AB8FEFE779F37AE5 FOREIGN KEY (id_user_id) REFERENCES utilisateur (id)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE compo_groupe DROP FOREIGN KEY FK_5AA250B7FA7089AB');
        $this->addSql('ALTER TABLE compo_groupe DROP FOREIGN KEY FK_5AA250B7659892D9');
        $this->addSql('ALTER TABLE compo_groupe DROP FOREIGN KEY FK_5AA250B7C6EE5C49');
        $this->addSql('ALTER TABLE titre_identite DROP FOREIGN KEY FK_AB8FEFE779F37AE5');
        $this->addSql('DROP TABLE acteur');
        $this->addSql('DROP TABLE compo_groupe');
        $this->addSql('DROP TABLE etat_visionnage');
        $this->addSql('DROP TABLE groupe_utilisateur');
        $this->addSql('DROP TABLE titre');
        $this->addSql('DROP TABLE titre_identite');
        $this->addSql('DROP TABLE type_utilisateur_groupe');
        $this->addSql('DROP TABLE utilisateur');
    }
}
