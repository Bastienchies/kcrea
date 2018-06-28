<?php

namespace App\Controller;

use App\Entity\Film;
//use Jleagle\CurlWrapper\Request;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Jleagle\Imdb\Imdb;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ResearchController extends Controller
{
    /**
     * @Route("/research", name="research")
     */
    public function index(Request $request)
    {
        Imdb::setApiKey("1748ba92");

        /*$form = $this->createFormBuilder()
            ->add('title', TextType::class, [
                'attr' => ['class' => 'form-control', 'type' => 'submit', 'name'=>'title', 'placeholder' => 'Search']
            ])
            ->getForm();

        $form->handleRequest($request);

        $film = new Film;

        if ($request->getMethod() == 'POST')$form->bindRequest($request);
        $movie[] = Imdb::search($form->getData());
        $film->setTitre(array_column($movie, 'title'));
        $film->setYear(array_column($movie, 'year'));
        $film->setPegi(array_column($movie, 'rated'));
        $film->setRealisation(array_column($movie, 'released'));
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

        if ($request->getMethod() == 'POST')$form->bindRequest($request);
        if ($form->isValid()) {
        $this->getDoctrine()->getEntityManager()->persist($form->getData());
        $this->getDoctrine()->getEntityManager()->flush();
        return $this->redirect($this->generateUrl('research_success'));
        }

        return $this->render('research/index.html.twig', [
            'form' => $form->createView(),
            'controller_name' => 'ResearchController',
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
        ]);*/

        $film = new Film();
        $form = $this->createFormBuilder()
            ->add('title', TextType::class)
            ->add('Search', SubmitType::class)
            ->getForm();
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form['title']->getData();
            /*$repository = $this
                ->getDoctrine()
                ->getManager()
                ->getRepository('CBMedBundle:Film')
            ;*/
            //$research = $repository->find($data);

            $filmsToSend = new ArrayCollection();

            $movie = Imdb::search($data);
            //print_r($movie);
            foreach ($movie as $film)
            {
                $filmResult = new Film();
                $filmResult->setTitre($film->title);
                $filmResult->setYear($film->year);
                //$film->setPegi(array_column($movie, 'rated'));
                //$film->setRealisation(array_column($movie, 'released'));
                //$film->setDuree(array_column($movie, 'runtime'));
                //$film->setGenre(array_column($movie, 'genre'));
                //$film->setRealisateur(array_column($movie, 'director'));
                //$film->setScenariste(array_column($movie, 'writer'));
                //$film->setActeur(array_column($movie, 'actors'));
                //$film->setIntrigue(array_column($movie, 'plot'));
                //$film->setLangue(array_column($movie, 'language'));
                //$film->setPays(array_column($movie, 'country'));
                //$filmResult->setPoster($film->poster);

                $filmsToSend->add($filmResult);
                /*$titre = $filmResult->getTitre();
                $year = $filmResult->getYear();
                //$pegi = $film->getPegi();
                //$realisation = $film->getRealisation();
                //$duree = $film->getDuree();
                //$genre = $film->getGenre();
                //$realisateur = $film->getRealisateur();
                //$scenariste = $film->getScenariste();
                //$acteur = $film->getActeur();
                //$intrigue = $film->getIntrigue();
                //$langue = $film->getLangue();
                //$pays = $film->getPays();
                $poster = $filmResult->getPoster();*/
            }

            print_r($filmsToSend);


            /*return $this->render('research/index.html.twig', array(
                'form' => $form->createView(),
                'research' => $filmsToSend
            ));*/
        }
        return $this->render('research/index.html.twig', array(
            'form' => $form->createView()
        ));
    }
}
