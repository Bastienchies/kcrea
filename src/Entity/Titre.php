<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TitreRepository")
 */
class Titre
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
    private $LibelleTitre;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\InformationTitre")
     * @ORM\JoinColumn(nullable=false,name="id_infotitre",referencedColumnName="id")
     */
    private $id_infoTitre;

    public function getId()
    {
        return $this->id;
    }

    public function getLibelleTitre(): ?string
    {
        return $this->LibelleTitre;
    }

    public function setLibelleTitre(string $LibelleTitre): self
    {
        $this->LibelleTitre = $LibelleTitre;

        return $this;
    }

    public function getIdInfoTitre(): ?InformationTitre
    {
        return $this->id_infoTitre;
    }

    public function setIdInfoTitre(?InformationTitre $id_infoTitre): self
    {
        $this->id_infoTitre = $id_infoTitre;

        return $this;
    }
}
