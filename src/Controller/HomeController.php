<?php

namespace App\Controller;

use App\Entity\Film;
use App\Entity\GenreFilm;
use App\Entity\InformationTitre;
use App\Entity\Realisateur;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends Controller
{
    /**
     * @Route("/", name="home")
     */
    public function index()
    {
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository(InformationTitre::class);
        $repository2 = $em->getRepository(Realisateur::class);
        $repository3 = $em->getRepository(GenreFilm::class);
        if($repository != null) {
            $filmsBDD = $repository->findBy(array('id_etatvisio' => '2'),null,3,0);

            foreach ($filmsBDD as $film) {
                $nFilm = new Film();
                $realisateur = $repository2->findOneBy([
                    'id' => $film->getIdRealisateur(),
                ]);
                $genre = $repository3->findOneBy([
                   'id' => $film->getIdGenrefilm(),
                ]);
                $nFilm->setRealisateur($realisateur->getNomRealisateur().' '.$realisateur->getPrenomRealisateur());
                $nFilm->setTitre($film->getTitreOriginal());
                $nFilm->setGenre($genre->getLibelleGenre());
                $nFilm->setIntrigue($film->getTitreInfoTitre());
                $nFilm->setPoster($film->getPosterLink());
                $films[] = $nFilm;
                }
        }

            return $this->render('home/index.html.twig', [
                'controller_name' => 'HomeController',
                'films' => $films,
            ]);
    }
}
