<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\GroupeUtilisateurRepository")
 */
class GroupeUtilisateur
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
    private $nom_groupe;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $image_groupe;

    public function getId()
    {
        return $this->id;
    }

    public function getNomGroupe(): ?string
    {
        return $this->nom_groupe;
    }

    public function setNomGroupe(string $nom_groupe): self
    {
        $this->nom_groupe = $nom_groupe;

        return $this;
    }

    public function getImageGroupe(): ?string
    {
        return $this->image_groupe;
    }

    public function setImageGroupe(string $image_groupe): self
    {
        $this->image_groupe = $image_groupe;

        return $this;
    }
}
