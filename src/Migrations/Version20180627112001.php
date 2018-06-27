<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180627112001 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE information_titre DROP FOREIGN KEY information_titre_ibfk_2');
        $this->addSql('ALTER TABLE lesgroupes DROP FOREIGN KEY lesGroupes_ibfk_2');
        $this->addSql('ALTER TABLE information_titre DROP FOREIGN KEY information_titre_ibfk_5');
        $this->addSql('ALTER TABLE information_titre DROP FOREIGN KEY information_titre_ibfk_3');
        $this->addSql('ALTER TABLE titre_identite DROP FOREIGN KEY titre_identite_ibfk_2');
        $this->addSql('ALTER TABLE lesgroupes DROP FOREIGN KEY lesGroupes_ibfk_3');
        $this->addSql('CREATE TABLE compo_groupe (id INT AUTO_INCREMENT NOT NULL, id_utilisateur_id INT NOT NULL, id_typeuser_id INT NOT NULL, id_groupe_id INT NOT NULL, INDEX IDX_5AA250B7C6EE5C49 (id_utilisateur_id), INDEX IDX_5AA250B7659892D9 (id_typeuser_id), INDEX IDX_5AA250B7FA7089AB (id_groupe_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE groupe_utilisateur (id INT AUTO_INCREMENT NOT NULL, nom_groupe VARCHAR(255) NOT NULL, image_groupe VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE titre (id INT AUTO_INCREMENT NOT NULL, libelle_titre VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_utilisateur_groupe (id INT AUTO_INCREMENT NOT NULL, libelle_typeutilisateur VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE compo_groupe ADD CONSTRAINT FK_5AA250B7C6EE5C49 FOREIGN KEY (id_utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE compo_groupe ADD CONSTRAINT FK_5AA250B7659892D9 FOREIGN KEY (id_typeuser_id) REFERENCES type_utilisateur_groupe (id)');
        $this->addSql('ALTER TABLE compo_groupe ADD CONSTRAINT FK_5AA250B7FA7089AB FOREIGN KEY (id_groupe_id) REFERENCES groupe_utilisateur (id)');
        $this->addSql('DROP TABLE genre');
        $this->addSql('DROP TABLE groupe');
        $this->addSql('DROP TABLE information_titre');
        $this->addSql('DROP TABLE lesgroupes');
        $this->addSql('DROP TABLE realisateur');
        $this->addSql('DROP TABLE titres');
        $this->addSql('DROP TABLE typeutilisateur_groupe');
        $this->addSql('ALTER TABLE acteur MODIFY id_acteur INT NOT NULL');
        $this->addSql('ALTER TABLE acteur DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE acteur DROP prenom_acteur, CHANGE nom_acteur nom_acteur VARCHAR(255) NOT NULL, CHANGE id_acteur id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE acteur ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE etat_visionnage MODIFY id_visionnage INT NOT NULL');
        $this->addSql('ALTER TABLE etat_visionnage DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE etat_visionnage CHANGE libelle_visionnage libelle_visionnage VARCHAR(255) NOT NULL, CHANGE id_visionnage id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE etat_visionnage ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE titre_identite MODIFY id_TitrIden INT NOT NULL');
        $this->addSql('ALTER TABLE titre_identite DROP FOREIGN KEY titre_identite_ibfk_3');
        $this->addSql('DROP INDEX titre_id ON titre_identite');
        $this->addSql('DROP INDEX idUtilisateur ON titre_identite');
        $this->addSql('ALTER TABLE titre_identite DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE titre_identite ADD id_user_id INT NOT NULL, DROP titre_id, DROP idUtilisateur, CHANGE avis avis VARCHAR(255) NOT NULL, CHANGE id_titriden id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE titre_identite ADD CONSTRAINT FK_AB8FEFE779F37AE5 FOREIGN KEY (id_user_id) REFERENCES utilisateur (id)');
        $this->addSql('CREATE INDEX IDX_AB8FEFE779F37AE5 ON titre_identite (id_user_id)');
        $this->addSql('ALTER TABLE titre_identite ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE utilisateur CHANGE nom_utilisateur nom_utilisateur VARCHAR(255) NOT NULL, CHANGE prenom_utilisateur prenom_utilisateur VARCHAR(255) NOT NULL, CHANGE password_utilisateur password_utilisateur VARCHAR(255) NOT NULL, CHANGE email_utilisateur email_utilisateur VARCHAR(255) NOT NULL, CHANGE avatar_utilisateur avatar_utilisateur VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE compo_groupe DROP FOREIGN KEY FK_5AA250B7FA7089AB');
        $this->addSql('ALTER TABLE compo_groupe DROP FOREIGN KEY FK_5AA250B7659892D9');
        $this->addSql('CREATE TABLE genre (id_genre INT AUTO_INCREMENT NOT NULL, libelle_genre VARCHAR(250) NOT NULL COLLATE utf8mb4_general_ci, PRIMARY KEY(id_genre)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE groupe (id_groupe INT AUTO_INCREMENT NOT NULL, nom_groupe INT NOT NULL, PRIMARY KEY(id_groupe)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE information_titre (id_titre INT AUTO_INCREMENT NOT NULL, visibilite_id INT NOT NULL, genre_id INT NOT NULL, titre_id INT NOT NULL, acteur_id INT NOT NULL, realisateur_id INT NOT NULL, affiche_titre VARCHAR(250) NOT NULL COLLATE utf8mb4_general_ci, dateSortie_titre DATE NOT NULL, titreOriginal_titre VARCHAR(250) NOT NULL COLLATE utf8mb4_general_ci, titre_titre VARCHAR(250) NOT NULL COLLATE utf8mb4_general_ci, INDEX visibilite_id (visibilite_id), INDEX genre_id (genre_id), INDEX titre_id (titre_id), INDEX acteur_id (acteur_id), INDEX realisateur_id (realisateur_id), PRIMARY KEY(id_titre)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lesgroupes (id_utilisateur INT NOT NULL, id_groupe INT NOT NULL, id_typeUti INT NOT NULL, INDEX id_typeUti (id_typeUti), INDEX id_utilisateur (id_utilisateur), INDEX id_typeUti_2 (id_typeUti), INDEX id_utilisateur_2 (id_utilisateur), INDEX id_groupe (id_groupe), INDEX id_typeUti_3 (id_typeUti)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE realisateur (id_realisateur INT AUTO_INCREMENT NOT NULL, nom_realisateur VARCHAR(25) NOT NULL COLLATE utf8mb4_general_ci, prenom_realisateur VARCHAR(25) NOT NULL COLLATE utf8mb4_general_ci, PRIMARY KEY(id_realisateur)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE titres (id_titre INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id_titre)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE typeutilisateur_groupe (id_typeUtilisateur INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id_typeUtilisateur)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE information_titre ADD CONSTRAINT information_titre_ibfk_1 FOREIGN KEY (visibilite_id) REFERENCES etat_visionnage (id_visionnage)');
        $this->addSql('ALTER TABLE information_titre ADD CONSTRAINT information_titre_ibfk_2 FOREIGN KEY (genre_id) REFERENCES genre (id_genre)');
        $this->addSql('ALTER TABLE information_titre ADD CONSTRAINT information_titre_ibfk_3 FOREIGN KEY (titre_id) REFERENCES titres (id_titre)');
        $this->addSql('ALTER TABLE information_titre ADD CONSTRAINT information_titre_ibfk_4 FOREIGN KEY (acteur_id) REFERENCES acteur (id_acteur)');
        $this->addSql('ALTER TABLE information_titre ADD CONSTRAINT information_titre_ibfk_5 FOREIGN KEY (realisateur_id) REFERENCES realisateur (id_realisateur)');
        $this->addSql('ALTER TABLE lesgroupes ADD CONSTRAINT lesGroupes_ibfk_1 FOREIGN KEY (id_utilisateur) REFERENCES utilisateur (id_utilisateur)');
        $this->addSql('ALTER TABLE lesgroupes ADD CONSTRAINT lesGroupes_ibfk_2 FOREIGN KEY (id_groupe) REFERENCES groupe (id_groupe)');
        $this->addSql('ALTER TABLE lesgroupes ADD CONSTRAINT lesGroupes_ibfk_3 FOREIGN KEY (id_typeUti) REFERENCES typeutilisateur_groupe (id_typeUtilisateur)');
        $this->addSql('DROP TABLE compo_groupe');
        $this->addSql('DROP TABLE groupe_utilisateur');
        $this->addSql('DROP TABLE titre');
        $this->addSql('DROP TABLE type_utilisateur_groupe');
        $this->addSql('ALTER TABLE acteur MODIFY id INT NOT NULL');
        $this->addSql('ALTER TABLE acteur DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE acteur ADD prenom_acteur VARCHAR(25) NOT NULL COLLATE utf8mb4_general_ci, CHANGE nom_acteur nom_acteur VARCHAR(25) NOT NULL COLLATE utf8mb4_general_ci, CHANGE id id_acteur INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE acteur ADD PRIMARY KEY (id_acteur)');
        $this->addSql('ALTER TABLE etat_visionnage MODIFY id INT NOT NULL');
        $this->addSql('ALTER TABLE etat_visionnage DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE etat_visionnage CHANGE libelle_visionnage libelle_visionnage VARCHAR(250) NOT NULL COLLATE utf8mb4_general_ci, CHANGE id id_visionnage INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE etat_visionnage ADD PRIMARY KEY (id_visionnage)');
        $this->addSql('ALTER TABLE titre_identite MODIFY id INT NOT NULL');
        $this->addSql('ALTER TABLE titre_identite DROP FOREIGN KEY FK_AB8FEFE779F37AE5');
        $this->addSql('DROP INDEX IDX_AB8FEFE779F37AE5 ON titre_identite');
        $this->addSql('ALTER TABLE titre_identite DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE titre_identite ADD idUtilisateur INT NOT NULL, CHANGE avis avis TEXT NOT NULL COLLATE utf8mb4_general_ci, CHANGE id_user_id titre_id INT NOT NULL, CHANGE id id_TitrIden INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE titre_identite ADD CONSTRAINT titre_identite_ibfk_2 FOREIGN KEY (titre_id) REFERENCES titres (id_titre)');
        $this->addSql('ALTER TABLE titre_identite ADD CONSTRAINT titre_identite_ibfk_3 FOREIGN KEY (idUtilisateur) REFERENCES utilisateur (id_utilisateur)');
        $this->addSql('CREATE INDEX titre_id ON titre_identite (titre_id)');
        $this->addSql('CREATE INDEX idUtilisateur ON titre_identite (idUtilisateur)');
        $this->addSql('ALTER TABLE titre_identite ADD PRIMARY KEY (id_TitrIden)');
        $this->addSql('ALTER TABLE utilisateur CHANGE nom_utilisateur nom_utilisateur VARCHAR(25) NOT NULL COLLATE utf8mb4_general_ci, CHANGE prenom_utilisateur prenom_utilisateur VARCHAR(25) NOT NULL COLLATE utf8mb4_general_ci, CHANGE password_utilisateur password_utilisateur VARCHAR(250) NOT NULL COLLATE utf8mb4_general_ci, CHANGE email_utilisateur email_utilisateur VARCHAR(250) NOT NULL COLLATE utf8mb4_general_ci, CHANGE avatar_utilisateur avatar_utilisateur VARCHAR(250) DEFAULT \'default_avatar.jpg\' NOT NULL COLLATE utf8mb4_general_ci');
    }
}
