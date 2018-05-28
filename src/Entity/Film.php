<?php
/**
 * Created by PhpStorm.
 * User: Horakle
 * Date: 15/05/2018
 * Time: 14:59
 */

namespace App\Entity;


class Film
{
    private $titre;
    private $year;
    private $pegi;
    private $realisation;
    private $duree;
    private $genre;
    private $realisateur;
    private $scenariste;
    private $acteur;
    private $intrigue;
    private $langue;
    private $pays;
    private $poster;
    private $note;

    /**
     * @return mixed
     */
    public function getPegi()
    {
        return $this->pegi;
    }

    /**
     * @param mixed $pegi
     */
    public function setPegi($pegi): void
    {
        $this->pegi = $pegi;
    }
    private $metascore;
    private $type;
    private $boxoffice;
    private $production;
    private $website;

    /**
     * @return mixed
     */
    public function getIntrigue()
    {
        return $this->intrigue;
    }

    /**
     * @param mixed $intrigue
     */
    public function setIntrigue($intrigue): void
    {
        $this->intrigue = $intrigue;
    }

    /**
     * @return mixed
     */
    public function getLangue()
    {
        return $this->langue;
    }

    /**
     * @param mixed $langue
     */
    public function setLangue($langue): void
    {
        $this->langue = $langue;
    }

    /**
     * @return mixed
     */
    public function getPays()
    {
        return $this->pays;
    }

    /**
     * @param mixed $pays
     */
    public function setPays($pays): void
    {
        $this->pays = $pays;
    }

    /**
     * @return mixed
     */
    public function getMetascore()
    {
        return $this->metascore;
    }

    /**
     * @param mixed $metascore
     */
    public function setMetascore($metascore): void
    {
        $this->metascore = $metascore;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type): void
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getBoxoffice()
    {
        return $this->boxoffice;
    }

    /**
     * @param mixed $boxoffice
     */
    public function setBoxoffice($boxoffice): void
    {
        $this->boxoffice = $boxoffice;
    }

    /**
     * @return mixed
     */
    public function getProduction()
    {
        return $this->production;
    }

    /**
     * @param mixed $production
     */
    public function setProduction($production): void
    {
        $this->production = $production;
    }

    /**
     * @return mixed
     */
    public function getWebsite()
    {
        return $this->website;
    }

    /**
     * @param mixed $website
     */
    public function setWebsite($website): void
    {
        $this->website = $website;
    }

    /**
     * @return mixed
     */
    public function getActeur()
    {
        return $this->acteur;
    }

    /**
     * @param mixed $acteur
     */
    public function setActeur($acteur): void
    {
        $this->acteur = $acteur;
    }

    /**
     * @return mixed
     */
    public function getDuree()
    {
        return $this->duree;
    }

    /**
     * @param mixed $duree
     */
    public function setDuree($duree): void
    {
        $this->duree = $duree;
    }

    /**
     * @return mixed
     */
    public function getGenre()
    {
        return $this->genre;
    }

    /**
     * @param mixed $genre
     */
    public function setGenre($genre): void
    {
        $this->genre = $genre;
    }

    /**
     * @return mixed
     */
    public function getRealisateur()
    {
        return $this->realisateur;
    }

    /**
     * @param mixed $realisateur
     */
    public function setRealisateur($realisateur): void
    {
        $this->realisateur = $realisateur;
    }

    /**
     * @return mixed
     */
    public function getScenariste()
    {
        return $this->scenariste;
    }

    /**
     * @param mixed $scenariste
     */
    public function setScenariste($scenariste): void
    {
        $this->scenariste = $scenariste;
    }

    /**
     * @return mixed
     */
    public function getPoster()
    {
        return $this->poster;
    }

    /**
     * @param mixed $poster
     */
    public function setPoster($poster): void
    {
        $this->poster = $poster;
    }

    /**
     * @return mixed
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * @param mixed $titre
     */
    public function setTitre($titre): void
    {
        $this->titre = $titre;
    }

    /**
     * @return mixed
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * @param mixed $year
     */
    public function setYear($year): void
    {
        $this->year = $year;
    }

    /**
     * @return mixed
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * @param mixed $note
     */
    public function setNote($note): void
    {
        $this->note = $note;
    }

    /**
     * @return mixed
     */
    public function getRealisation()
    {
        return $this->realisation;
    }

    /**
     * @param mixed $realisation
     */
    public function setRealisation($realisation): void
    {
        $this->realisation = $realisation;
    }
}