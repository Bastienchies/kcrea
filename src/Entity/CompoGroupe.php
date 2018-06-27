<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CompoGroupeRepository")
 *
 */
class CompoGroupe
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Utilisateur")
     * @ORM\JoinColumn(nullable=false,name="id_utilisateur",referencedColumnName="id_utilisateur")
     */
    private $id_utilisateur;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\TypeUtilisateurGroupe")
     * @ORM\JoinColumn(nullable=false, name="id_typeuser",referencedColumnName="id")
     *
     */
    private $id_typeuser;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\GroupeUtilisateur")
     * @ORM\JoinColumn(nullable=false,name="id_groupe",referencedColumnName="id")
     */
    private $id_groupe;

    public function getId()
    {
        return $this->id;
    }

    public function getIdUtilisateur(): ?Utilisateur
    {
        return $this->id_utilisateur;
    }

    public function setIdUtilisateur(?Utilisateur $id_utilisateur): self
    {
        $this->id_utilisateur = $id_utilisateur;

        return $this;
    }

    public function getIdTypeuser(): ?TypeUtilisateurGroupe
    {
        return $this->id_typeuser;
    }

    public function setIdTypeuser(?TypeUtilisateurGroupe $id_typeuser): self
    {
        $this->id_typeuser = $id_typeuser;

        return $this;
    }

    public function getIdGroupe(): ?GroupeUtilisateur
    {
        return $this->id_groupe;
    }

    public function setIdGroupe(?GroupeUtilisateur $id_groupe): self
    {
        $this->id_groupe = $id_groupe;

        return $this;
    }
}
