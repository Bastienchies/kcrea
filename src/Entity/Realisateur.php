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
    private $Nom_realisateur;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Prenom_realisateur;

    public function getId()
    {
        return $this->id;
    }

    public function getNomRealisateur(): ?string
    {
        return $this->Nom_realisateur;
    }

    public function setNomRealisateur(string $Nom_realisateur)
    {
        $this->Nom_realisateur = $Nom_realisateur;

        return $this->Nom_realisateur;
    }

    public function getPrenomRealisateur(): ?string
    {
        return $this->Prenom_realisateur;
    }

    public function setPrenomRealisateur(string $Prenom_realisateur)
    {
        $this->Prenom_realisateur = $Prenom_realisateur;

        return $this->Prenom_realisateur;
    }
}
