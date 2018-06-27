<?php

namespace App\Controller;

use Jleagle\Imdb\Imdb;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use App\Entity\Film;

class ApiMediaController extends Controller
{
    /**
     * @Route("/api/media", name="api_media")
     */
    public function index()
    {
        Imdb::setApiKey("1748ba92");

        $film = new Film;

        $movie[] = Imdb::retrieve('deadpool 2');
        $film->setTitre(array_column($movie,'title'));
        $film->setYear(array_column($movie,'year'));
        $film->setPegi(array_column($movie,'rated'));
        $film->setRealisation(array_column($movie,'released'));
        $film->setDuree(array_column($movie,'runtime'));
        $film->setGenre(array_column($movie,'genre'));
        $film->setRealisateur(array_column($movie,'director'));
        $film->setScenariste(array_column($movie,'writer'));
        $film->setActeur(array_column($movie,'actors'));
        $film->setIntrigue(array_column($movie,'plot'));
        $film->setLangue(array_column($movie,'language'));
        $film->setPays(array_column($movie,'country'));
        $film->setPoster(array_column($movie, 'poster'));

        $titre = $film->getTitre();
        $year = $film->getYear();
        $pegi = $film->getPegi();
        $realisation = $film->getRealisation();
        $duree = $film->getDuree();
        $genre = $film->getGenre();
        $realisateur = $film->getRealisateur();
        $scenariste = $film->getScenariste();
        $acteur = $film->getActeur();
        $intrigue = $film->getIntrigue();
        $langue = $film->getLangue();
        $pays = $film->getPays();
        $poster = $film->getPoster();

        return $this->render('api_media/index.html.twig', [
            'controller_name' => 'ApiMediaController',
            'session'   => $_SESSION['_sf2_attributes'],
            'titre' => $titre[0],
            'year' => $year[0],
            'pegi' => $pegi[0],
            'realisation' => $realisation[0],
            'duree' => $duree[0],
            'genre' => $genre[0],
            'realisateur' => $realisateur[0],
            'scenariste' => $scenariste[0],
            'acteur' => $acteur[0],
            'intrigue' => $intrigue[0],
            'langue' => $langue[0],
            'pays' => $pays[0],
            'poster' => $poster[0],
        ]);

    }
}
