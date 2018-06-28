<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TitreIdentiteRepository")
 */
class TitreIdentite
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $Note;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Avis;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Utilisateur")
     * @ORM\JoinColumn(nullable=false,name="id_user",referencedColumnName="id_utilisateur")
     */
    private $Id_user;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Titre")
     * @ORM\JoinColumn(nullable=false,name="id_titre",referencedColumnName="id")
     */
    private $id_titre;

    public function getId()
    {
        return $this->id;
    }

    public function getNote(): ?int
    {
        return $this->Note;
    }

    public function setNote(int $Note): int
    {
        $this->Note = $Note;

        return $this->Note;
    }

    public function getAvis(): ?string
    {
        return $this->Avis;
    }

    public function setAvis(string $Avis): self
    {
        $this->Avis = $Avis;

        return $this;
    }

    public function getIdUser(): ?Utilisateur
    {
        return $this->Id_user;
    }

    public function setIdUser(?Utilisateur $Id_user): self
    {
        $this->Id_user = $Id_user;

        return $this;
    }

    public function getIdTitre(): ?Titre
    {
        return $this->id_titre;
    }

    public function setIdTitre(?Titre $id_titre): self
    {
        $this->id_titre = $id_titre;

        return $this;
    }
}
