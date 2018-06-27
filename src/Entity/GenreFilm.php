<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\GenreFilmRepository")
 */
class GenreFilm
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
    private $libelle_genre;

    public function getId()
    {
        return $this->id;
    }

    public function getLibelleGenre(): ?string
    {
        return $this->libelle_genre;
    }

    public function setLibelleGenre(string $libelle_genre): self
    {
        $this->libelle_genre = $libelle_genre;

        return $this;
    }
}
