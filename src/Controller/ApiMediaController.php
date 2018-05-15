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

        $movie[] = Imdb::retrieve('the matrix');
        $film->setTitre(array_column($movie,'title'));
        $film->setTitre(array_column($movie,'year'));
        $film->setTitre(array_column($movie,'pegi'));
        $film->setTitre(array_column($movie,'realisation'));
        $film->setTitre(array_column($movie,'scenariste'));
        $film->setTitre(array_column($movie,'acteur'));
        $film->setTitre(array_column($movie,'intrigue'));
        $film->setTitre(array_column($movie,'langue'));
        $film->setTitre(array_column($movie,'pays'));
        $film->setPoster(array_column($movie, 'poster'));
        $film->setPoster(array_column($movie, 'note'));

        $titre = $film->getTitre();
        $year = $film->getYear();
        $pegi = $film->getPegi();
        $realisation = $film->getRealisation();
        $scenariste = $film->getScenariste();
        $acteur = $film->getActeur();
        $intrigue = $film->getIntrigue();
        $langue = $film->getLangue();
        $pays = $film->getPays();
        $poster = $film->getPoster();
        $note = $film->getNote();

        return $this->render('api_media/index.html.twig', [
            'controller_name' => 'ApiMediaController',
            'titre' => $titre[0],
            'year' => $year[0],
            'pegi' => $pegi[0],
            'realisation' => $realisation[0],
            'scenariste' => $scenariste[0],
            'acteur' => $acteur[0],
            'intrigue' => $intrigue[0],
            'langue' => $langue[0],
            'pays' => $pays[0],
            'poster' => $poster[0],
            'note' => $note[0],
        ]);

    }
}
