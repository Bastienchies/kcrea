<?php

namespace App\Controller;

use App\Entity\EtatVisionnage;
use App\Entity\GenreFilm;
use App\Entity\InformationTitre;
use App\Entity\Realisateur;
use App\Entity\TitreIdentite;
use App\Entity\Utilisateur;
use Doctrine\ORM\Mapping\Entity;
use Jleagle\Imdb\Imdb;
use phpDocumentor\Reflection\Types\Null_;
use Symfony\Component\DependencyInjection\Tests\Compiler\G;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\Session;
use App\Entity\Film;
use Symfony\Component\Validator\Constraints\DateTime;

class ApiMediaController extends Controller
{
    /**
     * @Route("/api/media", name="api_media")
     */
    public function index($id)
    {
        Imdb::setApiKey("1748ba92");

        $film = new Film;

        $movie[] = Imdb::retrieve($id);
        $film->setTitre(array_column($movie, 'title'));
        $film->setYear(array_column($movie, 'year'));
        $film->setPegi(array_column($movie, 'rated'));
        $released = array_column($movie, 'released');
        $film->setRealisation($released['0']);
        $film->setDuree(array_column($movie, 'runtime'));
        $film->setGenre(array_column($movie, 'genre'));
        $film->setRealisateur(array_column($movie, 'director'));
        $film->setScenariste(array_column($movie, 'writer'));
        $film->setActeur(array_column($movie, 'actors'));
        $film->setIntrigue(array_column($movie, 'plot'));
        $film->setLangue(array_column($movie, 'language'));
        $film->setPays(array_column($movie, 'country'));
        $film->setPoster(array_column($movie, 'poster'));


        $titre = $film->getTitre();
        $year = $film->getYear();
        $pegi = $film->getPegi();
        $realisation = date('Y-m-d', strToTime($film->getRealisation()));
        $duree = $film->getDuree();
        $genre = $film->getGenre();
        $realisateurs = $film->getRealisateur();
        $scenariste = $film->getScenariste();
        $acteur = $film->getActeur();
        $intrigue = $film->getIntrigue();
        $langue = $film->getLangue();
        $pays = $film->getPays();
        $poster = $film->getPoster();

        $titreIdentite = new TitreIdentite();
        $checknoteTitre = "";
        $checkavisTitre = "";
        $session = New session();

        if (isset($_POST['note'])) {
            $em = $this->getDoctrine()->getManager();
            $repoFilm = $em->getRepository(InformationTitre::class);
            if ($repoFilm != null) {
                $infoFilm = $repoFilm->findOneBy(['InfoTitre' => $titre]);

                if ($infoFilm == null) {
                    $infoFilm = new InformationTitre();
                    $infoFilm->setTitreOriginal($titre['0']);
                    $infoFilm->setPosterLink($poster['0']);
                    $infoFilm->setTitreInfotitre($intrigue['0']);
                    $infoFilm->setInfoTitre($titre['0']);
                    $infoFilm->setDateSortie($realisation);

                    $repository = $em->getRepository(Utilisateur::class);
                    $repository2 = $em->getRepository(Realisateur::class);
                    $repository3 = $em->getRepository(EtatVisionnage::class);
                    $repository4 = $em->getRepository(GenreFilm::class);
                    if ($repository != null) {
                        $user = $repository->find($session->get('id'));
                        $realisateur = new Realisateur();
                        foreach ($realisateurs as $realisateur)
                            $eachreal = explode(",", $realisateur);
                        foreach ($eachreal as $ereal => $value) {
                            $realisat = explode(" ", trim($value));
                            $real = $repository2->findOneBy([
                                'Nom_realisateur' => $realisat['0'],
                                'Prenom_realisateur' => $realisat['1'],
                            ]);

                            if ($real == null) {
                                $newReal = new Realisateur();
                                $newReal->setNomRealisateur($realisat['0']);
                                $newReal->setPrenomRealisateur($realisat['1']);
                                $em->persist($newReal);
                                $em->flush();
                            } else {
                                $infoFilm->setIdRealisateur($real);
                                $titreIdentite->setIdTitre($infoFilm);
                            }

                            $etvisio = $repository3->findOneBy([
                                'id' => '1'
                            ]);

                            if ($etvisio != null){
                                $infoFilm->setIdEtatvisio($etvisio);
                            }

                            $lesgenres = explode(",", $genre['0']);
                            foreach ($lesgenres as $index => $value) {
                                $ungenre = trim($value);
                                $genreBDD = $repository4->findOneBy([
                                    'libelle_genre' => $ungenre
                                ]);

                                if ($genreBDD == null) {
                                    $genrefilm = new GenreFilm();
                                    $genrefilm->setLibelleGenre($ungenre);
                                    $em->persist($genrefilm);
                                    $em->flush();
                                } else {
                                    $infoFilm->setIdGenrefilm($genreBDD);
                                }
                            }


                                if ($real != null && $genreBDD != null && $etvisio != null){
                                    $titreIdentite->setIdUser($user);
                                    $film->setNote($_POST['note']);
                                    $titreIdentite->setNote($_POST['note']);
                                    $titreIdentite->setAvis($_POST['avis']);
                                }
                                else{
                                    $lesgenres = explode(",", $genre['0']);
                                    foreach ($lesgenres as $index => $value) {
                                        $ungenre = trim($value);
                                        $genreBDD = $repository4->findOneBy([
                                            'libelle_genre' => $ungenre
                                        ]);
                                        $infoFilm->setIdGenrefilm($genreBDD);
                                    }
                                    foreach ($eachreal as $ereal => $value) {
                                        $realisat = explode(" ", trim($value));
                                        $real = $repository2->findOneBy([
                                            'Nom_realisateur' => $realisat['0'],
                                            'Prenom_realisateur' => $realisat['1'],
                                        ]);

                                        $infoFilm->setIdRealisateur($real);
                                        $titreIdentite->setIdTitre($infoFilm);
                                    }
                                    $titreIdentite->setIdUser($user);
                                    $film->setNote($_POST['note']);
                                    $titreIdentite->setNote($_POST['note']);
                                    $titreIdentite->setAvis($_POST['avis']);
                                }
                            $em->persist($titreIdentite);
                            $em->flush();
                        }
                    }
                }

                $repoCheckFilm = $em->getRepository(TitreIdentite::class);
                if ($repoCheckFilm != null) {
                        $queryBuilder = $em->createQueryBuilder();
                        $queryBuilder->update(TitreIdentite::class, 'ti')
                            ->set('ti.Avis', '?1')
                            ->set('ti.Note', '?2')
                            ->where('ti.Id_user = ?3 AND ti.id_titre = ?4')
                            ->setParameter(1, $_POST['avis'])
                            ->setParameter(2, $_POST['note'])
                            ->setParameter(3, $session->get('id'))
                            ->setParameter(4, $infoFilm->getId());

                        $query = $queryBuilder->getQuery();

                        echo $query->execute(), "\n";

                    $entityManager = $this->getDoctrine()->getManager();
                    $repositoryFilm = $entityManager->getRepository(InformationTitre::class);
                    $informationFilm = $repositoryFilm->findOneBy(['InfoTitre' => $titre]);
                    if($informationFilm != null) {
                        $repoCheckFilm = $entityManager->getRepository(TitreIdentite::class);
                        if ($repoCheckFilm != null) {
                            $informationFilm = $repoCheckFilm->findOneBy(
                                ['id_titre' => $informationFilm->getId(),
                                    'Id_user' => $session->get('id')
                                ]);
                            if($informationFilm != null){
                                $checkavisTitre = $informationFilm->getAvis();
                                $checknoteTitre = $informationFilm->getNote();
                            }
                        }
                    }
                }
                return $this->render('api_media/index.html.twig', [
                    'controller_name' => 'ApiMediaController',
                    'session' => $_SESSION['_sf2_attributes'],
                    'titre' => $titre[0],
                    'year' => $year[0],
                    'pegi' => $pegi[0],
                    'realisation' => $realisation[0],
                    'duree' => $duree[0],
                    'genre' => $genre[0],
                    'realisateur' => $realisateurs[0],
                    'scenariste' => $scenariste[0],
                    'acteur' => $acteur[0],
                    'intrigue' => $intrigue[0],
                    'langue' => $langue[0],
                    'pays' => $pays[0],
                    'poster' => $poster[0],
                    'id' => $id,
                    'noteTitre' => $checknoteTitre,
                    'avisTitre' => $checkavisTitre
                ]);
            }
        }

        $entityManager = $this->getDoctrine()->getManager();
        $repositoryFilm = $entityManager->getRepository(InformationTitre::class);
        $informationFilm = $repositoryFilm->findOneBy(['InfoTitre' => $titre]);
        if($informationFilm != null) {
            $repoCheckFilm = $entityManager->getRepository(TitreIdentite::class);
            if ($repoCheckFilm != null) {
                $informationFilm = $repoCheckFilm->findOneBy(
                    ['id_titre' => $informationFilm->getId(),
                        'Id_user' => $session->get('id')
                    ]);
                if($informationFilm != null){
                    $checkavisTitre = $informationFilm->getAvis();
                    $checknoteTitre = $informationFilm->getNote();
                }
            }
        }
            return $this->render('api_media/index.html.twig', [
                'controller_name' => 'ApiMediaController',
                'session' => $_SESSION['_sf2_attributes'],
                'titre' => $titre[0],
                'year' => $year[0],
                'pegi' => $pegi[0],
                'realisation' => $realisation[0],
                'duree' => $duree[0],
                'genre' => $genre[0],
                'realisateur' => $realisateurs[0],
                'scenariste' => $scenariste[0],
                'acteur' => $acteur[0],
                'intrigue' => $intrigue[0],
                'langue' => $langue[0],
                'pays' => $pays[0],
                'poster' => $poster[0],
                'id' => $id,
                'noteTitre' =>$checknoteTitre,
                'avisTitre' =>$checkavisTitre
            ]);
    }

        public function search(string $nomFilm)
        {
            Imdb::setApiKey("1748ba92");

            $movie[] = Imdb::search($nomFilm);
            return $this->render('api_media/index.html.twig', [
                'controller_name' => 'ApiMediaController',
                'films' => $movie
            ]);

        }
}