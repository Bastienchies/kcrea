<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RealisateurRepository")
 */
class Realisateur
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Nom_utilisateur;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Prenom_realisateur;

    public function getId()
    {
        return $this->id;
    }

    public function getNomUtilisateur(): ?string
    {
        return $this->Nom_utilisateur;
    }

    public function setNomUtilisateur(string $Nom_utilisateur): self
    {
        $this->Nom_utilisateur = $Nom_utilisateur;

        return $this;
    }

    public function getPrenomRealisateur(): ?string
    {
        return $this->Prenom_realisateur;
    }

    public function setPrenomRealisateur(string $Prenom_realisateur): self
    {
        $this->Prenom_realisateur = $Prenom_realisateur;

        return $this;
    }
}
