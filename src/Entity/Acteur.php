<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ActeurRepository")
 */
class Acteur
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
    private $nom_acteur;

    public function getId()
    {
        return $this->id;
    }

    public function getNomActeur(): ?string
    {
        return $this->nom_acteur;
    }

    public function setNomActeur(string $nom_acteur): self
    {
        $this->nom_acteur = $nom_acteur;

        return $this;
    }
}
