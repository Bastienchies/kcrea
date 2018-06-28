<?php

namespace App\Controller;

use App\Entity\CompoGroupe;
use App\Entity\GroupeUtilisateur;
use App\Entity\TypeUtilisateurGroupe;
use App\Entity\Utilisateur;
use function PHPSTORM_META\type;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class GroupsController extends Controller
{
    /**
     * @Route("/groups", name="groups")
     */


    public function index(Request $request)
    {

        $request->getSession()->getFlashBag()->clear();

        $unGroupe = new GroupeUtilisateur();
        $unGroupeCompo = new CompoGroupe();



        $form = $this->createFormBuilder($unGroupe)
            ->add('nom_groupe', TextType::class, [
                'attr' => ['class' => 'form-control','name' => 'nom_groupe','placeholder' => 'Nom du groupe'],
            ])

            ->add('enregistrement', SubmitType::class, [
                'attr' => ['class' => 'btn btn-info btn-block','name' => 'password','type'=>'submit', 'value' => 'Enregistrement'],
            ])
            ->getForm();

        $form->handleRequest($request);



        if ($form->isSubmitted() && $form->isValid()) {

            $session = new Session();

            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $unGroupe= $form->getData();
            $unGroupe->setImageGroupe('marvel.png');
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($unGroupe);
            $entityManager->flush();

            $unGroupeCompo->setIdTypeuser(1);
            $unGroupeCompo->setIdGroupe($unGroupe->getId());
            $unGroupeCompo->setIdUtilisateur($session->get("id"));
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($unGroupeCompo);
            $entityManager->flush();


            $request->getSession()->getFlashBag()
                ->add('success-register-name', $unGroupe->getNomGroupe() );
            //return $this->redirectToRoute('task_success');


        }

        if (isset($_POST['id'])) {

            $session = new Session();

            $unGroupeCompo->setIdTypeuser(2);
            $unGroupeCompo->setIdGroupe($_POST['id']);
            $unGroupeCompo->setIdUtilisateur($session->get("id"));
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($unGroupeCompo);
            $entityManager->flush();
        }

        $groupes = $this->listeGroupe();

        if (!$groupes){
            $groupes =  'aucun groupe pour le moment';
        }else {
            foreach ($groupes AS $groupe) {
                $id = $groupe->getIdGroupe();
                $mesgroupe = $this->mesGroupe($id);




            }
        }

        $toutlesgroupe = $this->listAllGroup();

        return $this->render('groups/index.html.twig', [
            'form' =>$form->createView(),
            'mesgroupe' => $mesgroupe,
            'lesGroupes' => $toutlesgroupe
        ]);
    }



    public function listeGroupe()
    {
        $session = new Session();
        $idUser = $session->get("id");
        $groupe = $this->getDoctrine()
            ->getRepository(CompoGroupe::Class)
            ->findBy(array("id_utilisateur"=>$idUser));

        if (!$groupe) {

             $groupe =  'aucun groupe pour le moment';

        }
        return $groupe;

    }

    public function mesGroupe($id)
    {

        $mesgroupe = $this->getDoctrine()
            ->getRepository(GroupeUtilisateur::Class)
            ->findBy(array("id"=>$id));

        if (!$mesgroupe) {

            $mesgroupe =  'aucun groupe pour le moment';

        }
        return $mesgroupe;

    }



    public function listAllGroup() {
        $lesgroupes = $this->getDoctrine()
            ->getRepository(GroupeUtilisateur::Class)
            ->findAll();

        if (!$lesgroupes) {

            $lesgroupes =  'aucun groupe pour le moment';

        }
        return $lesgroupes;
    }
}
