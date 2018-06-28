<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\InformationTitreRepository")
 */
class InformationTitre
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
    private $InfoTitre;

    /**
     * @ORM\Column(type="string")
     */
    private $DateSortie;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $TitreOriginal;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $titre_infotitre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Poster_link;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Realisateur")
     * @ORM\JoinColumn(nullable=false,name="id_realisateur",referencedColumnName="id")
     */
    private $id_realisateur;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\EtatVisionnage")
     * @ORM\JoinColumn(nullable=false,name="id_etatvisio",referencedColumnName="id")
     */
    private $id_etatvisio;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\GenreFilm")
     * @ORM\JoinColumn(nullable=false,name="id_genrefilm",referencedColumnName="id")
     */
    private $id_genrefilm;

    public function getId()
    {
        return $this->id;
    }

    public function getInfoTitre(): ?string
    {
        return $this->InfoTitre;
    }

    public function setInfoTitre(string $InfoTitre): self
    {
        $this->InfoTitre = $InfoTitre;

        return $this;
    }

    public function getDateSortie()
    {
        return $this->DateSortie;
    }

    public function setDateSortie($DateSortie): self
    {
        $this->DateSortie = $DateSortie;

        return $this;
    }

    public function getTitreOriginal(): ?string
    {
        return $this->TitreOriginal;
    }

    public function setTitreOriginal(string $TitreOriginal): self
    {
        $this->TitreOriginal = $TitreOriginal;

        return $this;
    }

    public function getTitreInfotitre(): ?string
    {
        return $this->titre_infotitre;
    }

    public function setTitreInfotitre(string $titre_infotitre): self
    {
        $this->titre_infotitre = $titre_infotitre;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPosterLink()
    {
        return $this->Poster_link;
    }

    /**
     * @param mixed $Poster_link
     */
    public function setPosterLink($Poster_link): void
    {
        $this->Poster_link = $Poster_link;
    }



    public function getIdRealisateur(): ?Realisateur
    {
        return $this->id_realisateur;
    }

    public function setIdRealisateur(?Realisateur $id_realisateur): self
    {
        $this->id_realisateur = $id_realisateur;

        return $this;
    }

    public function getIdEtatvisio(): ?EtatVisionnage
    {
        return $this->id_etatvisio;
    }

    public function setIdEtatvisio(?EtatVisionnage $id_etatvisio): self
    {
        $this->id_etatvisio = $id_etatvisio;

        return $this;
    }

    public function getIdGenrefilm(): ?GenreFilm
    {
        return $this->id_genrefilm;
    }

    public function setIdGenrefilm(?GenreFilm $id_genrefilm): self
    {
        $this->id_genrefilm = $id_genrefilm;

        return $this;
    }
}
