<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CompoFilmActeurRepository")
 */
class CompoFilmActeur
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\InformationTitre")
     * @ORM\JoinColumn(nullable=false,name="id_titreinfo",referencedColumnName="id")
     */
    private $id_TitreInfo;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Acteur")
     * @ORM\JoinColumn(nullable=false,name="id_acteur",referencedColumnName="id")
     */
    private $id_acteur;

    public function getId()
    {
        return $this->id;
    }

    public function getIdTitreInfo(): ?InformationTitre
    {
        return $this->id_TitreInfo;
    }

    public function setIdTitreInfo(?InformationTitre $id_TitreInfo): self
    {
        $this->id_TitreInfo = $id_TitreInfo;

        return $this;
    }

    public function getIdActeur(): ?Acteur
    {
        return $this->id_acteur;
    }

    public function setIdActeur(?Acteur $id_acteur): self
    {
        $this->id_acteur = $id_acteur;

        return $this;
    }
}
