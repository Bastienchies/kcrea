<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TypeUtilisateurGroupeRepository")
 */
class TypeUtilisateurGroupe
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
    private $libelle_typeutilisateur;

    public function getId()
    {
        return $this->id;
    }

    public function getLibelleTypeutilisateur(): ?string
    {
        return $this->libelle_typeutilisateur;
    }

    public function setLibelleTypeutilisateur(string $libelle_typeutilisateur): self
    {
        $this->libelle_typeutilisateur = $libelle_typeutilisateur;

        return $this;
    }
}
