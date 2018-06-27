<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EtatVisionnageRepository")
 */
class EtatVisionnage
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
    private $Libelle_visionnage;

    public function getId()
    {
        return $this->id;
    }

    public function getLibelleVisionnage(): ?string
    {
        return $this->Libelle_visionnage;
    }

    public function setLibelleVisionnage(string $Libelle_visionnage): self
    {
        $this->Libelle_visionnage = $Libelle_visionnage;

        return $this;
    }
}
