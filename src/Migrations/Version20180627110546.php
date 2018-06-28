<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180627110546 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE information_titre DROP FOREIGN KEY information_titre_ibfk_4');
        $this->addSql('ALTER TABLE information_titre DROP FOREIGN KEY information_titre_ibfk_1');
        $this->addSql('ALTER TABLE information_titre DROP FOREIGN KEY information_titre_ibfk_2');
        $this->addSql('ALTER TABLE information_titre DROP FOREIGN KEY information_titre_ibfk_5');
        $this->addSql('ALTER TABLE information_titre DROP FOREIGN KEY information_titre_ibfk_3');
        $this->addSql('ALTER TABLE titre_identite DROP FOREIGN KEY titre_identite_ibfk_2');
        $this->addSql('ALTER TABLE lesgroupes DROP FOREIGN KEY lesGroupes_ibfk_3');
        $this->addSql('CREATE TABLE type_utilisateur_groupe (id INT AUTO_INCREMENT NOT NULL, libelle_typeutilisateur VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('DROP TABLE acteur');
        $this->addSql('DROP TABLE etat_visionnage');
        $this->addSql('DROP TABLE genre');
        $this->addSql('DROP TABLE information_titre');
        $this->addSql('DROP TABLE lesgroupes');
        $this->addSql('DROP TABLE realisateur');
        $this->addSql('DROP TABLE titre_identite');
        $this->addSql('DROP TABLE titres');
        $this->addSql('DROP TABLE typeutilisateur_groupe');
        $this->addSql('ALTER TABLE groupe_utilisateur CHANGE nom_groupe nom_groupe VARCHAR(255) NOT NULL, CHANGE image_groupe image_groupe VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE utilisateur ADD roles JSON NOT NULL, CHANGE nom_utilisateur nom_utilisateur VARCHAR(255) NOT NULL, CHANGE prenom_utilisateur prenom_utilisateur VARCHAR(255) NOT NULL, CHANGE password_utilisateur password_utilisateur VARCHAR(255) NOT NULL, CHANGE email_utilisateur email_utilisateur VARCHAR(255) NOT NULL, CHANGE avatar_utilisateur avatar_utilisateur VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE acteur (id_acteur INT AUTO_INCREMENT NOT NULL, prenom_acteur VARCHAR(25) NOT NULL COLLATE utf8mb4_general_ci, nom_acteur VARCHAR(25) NOT NULL COLLATE utf8mb4_general_ci, PRIMARY KEY(id_acteur)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE etat_visionnage (id_visionnage INT AUTO_INCREMENT NOT NULL, libelle_visionnage VARCHAR(250) NOT NULL COLLATE utf8mb4_general_ci, PRIMARY KEY(id_visionnage)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE genre (id_genre INT AUTO_INCREMENT NOT NULL, libelle_genre VARCHAR(250) NOT NULL COLLATE utf8mb4_general_ci, PRIMARY KEY(id_genre)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE information_titre (id_titre INT AUTO_INCREMENT NOT NULL, visibilite_id INT NOT NULL, genre_id INT NOT NULL, titre_id INT NOT NULL, acteur_id INT NOT NULL, realisateur_id INT NOT NULL, affiche_titre VARCHAR(250) NOT NULL COLLATE utf8mb4_general_ci, dateSortie_titre DATE NOT NULL, titreOriginal_titre VARCHAR(250) NOT NULL COLLATE utf8mb4_general_ci, titre_titre VARCHAR(250) NOT NULL COLLATE utf8mb4_general_ci, INDEX visibilite_id (visibilite_id), INDEX genre_id (genre_id), INDEX titre_id (titre_id), INDEX acteur_id (acteur_id), INDEX realisateur_id (realisateur_id), PRIMARY KEY(id_titre)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lesgroupes (id_utilisateur INT NOT NULL, id_groupe INT NOT NULL, id_typeUti INT NOT NULL, INDEX id_typeUti (id_typeUti), INDEX id_utilisateur (id_utilisateur), INDEX id_typeUti_2 (id_typeUti), INDEX id_utilisateur_2 (id_utilisateur), INDEX id_groupe (id_groupe), INDEX id_typeUti_3 (id_typeUti)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE realisateur (id_realisateur INT AUTO_INCREMENT NOT NULL, nom_realisateur VARCHAR(25) NOT NULL COLLATE utf8mb4_general_ci, prenom_realisateur VARCHAR(25) NOT NULL COLLATE utf8mb4_general_ci, PRIMARY KEY(id_realisateur)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE titre_identite (titre_id INT NOT NULL, id_TitrIden INT AUTO_INCREMENT NOT NULL, note INT NOT NULL, avis TEXT NOT NULL COLLATE utf8mb4_general_ci, idUtilisateur INT NOT NULL, INDEX titre_id (titre_id), INDEX idUtilisateur (idUtilisateur), PRIMARY KEY(id_TitrIden)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE titres (id_titre INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id_titre)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE typeutilisateur_groupe (id_typeUtilisateur INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id_typeUtilisateur)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE information_titre ADD CONSTRAINT information_titre_ibfk_1 FOREIGN KEY (visibilite_id) REFERENCES etat_visionnage (id_visionnage)');
        $this->addSql('ALTER TABLE information_titre ADD CONSTRAINT information_titre_ibfk_2 FOREIGN KEY (genre_id) REFERENCES genre (id_genre)');
        $this->addSql('ALTER TABLE information_titre ADD CONSTRAINT information_titre_ibfk_3 FOREIGN KEY (titre_id) REFERENCES titres (id_titre)');
        $this->addSql('ALTER TABLE information_titre ADD CONSTRAINT information_titre_ibfk_4 FOREIGN KEY (acteur_id) REFERENCES acteur (id_acteur)');
        $this->addSql('ALTER TABLE information_titre ADD CONSTRAINT information_titre_ibfk_5 FOREIGN KEY (realisateur_id) REFERENCES realisateur (id_realisateur)');
        $this->addSql('ALTER TABLE lesgroupes ADD CONSTRAINT lesGroupes_ibfk_1 FOREIGN KEY (id_utilisateur) REFERENCES utilisateur (id_utilisateur)');
        $this->addSql('ALTER TABLE lesgroupes ADD CONSTRAINT lesGroupes_ibfk_2 FOREIGN KEY (id_groupe) REFERENCES groupe_utilisateur (id)');
        $this->addSql('ALTER TABLE lesgroupes ADD CONSTRAINT lesGroupes_ibfk_3 FOREIGN KEY (id_typeUti) REFERENCES typeutilisateur_groupe (id_typeUtilisateur)');
        $this->addSql('ALTER TABLE titre_identite ADD CONSTRAINT titre_identite_ibfk_2 FOREIGN KEY (titre_id) REFERENCES titres (id_titre)');
        $this->addSql('ALTER TABLE titre_identite ADD CONSTRAINT titre_identite_ibfk_3 FOREIGN KEY (idUtilisateur) REFERENCES utilisateur (id_utilisateur)');
        $this->addSql('DROP TABLE type_utilisateur_groupe');
        $this->addSql('ALTER TABLE groupe_utilisateur CHANGE nom_groupe nom_groupe VARCHAR(15) NOT NULL COLLATE utf8mb4_general_ci, CHANGE image_groupe image_groupe VARCHAR(250) DEFAULT NULL COLLATE utf8mb4_general_ci');
        $this->addSql('ALTER TABLE utilisateur DROP roles, CHANGE nom_utilisateur nom_utilisateur VARCHAR(25) NOT NULL COLLATE utf8mb4_general_ci, CHANGE prenom_utilisateur prenom_utilisateur VARCHAR(25) NOT NULL COLLATE utf8mb4_general_ci, CHANGE password_utilisateur password_utilisateur VARCHAR(250) NOT NULL COLLATE utf8mb4_general_ci, CHANGE email_utilisateur email_utilisateur VARCHAR(250) NOT NULL COLLATE utf8mb4_general_ci, CHANGE avatar_utilisateur avatar_utilisateur VARCHAR(250) DEFAULT \'default_avatar.jpg\' NOT NULL COLLATE utf8mb4_general_ci');
    }
}
