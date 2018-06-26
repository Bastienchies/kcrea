<?php

namespace App\Controller;

use App\Entity\Groupe;
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

        $unGroupe = new Groupe();

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

            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $unGroupe= $form->getData();
            $unGroupe->setImageGroupe('marvel.png');
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($unGroupe);
            $entityManager->flush();


            $request->getSession()->getFlashBag()
                ->add('success-register-name', $unGroupe->getNomGroupe() );
            //return $this->redirectToRoute('task_success');
        }



        return $this->render('groups/index.html.twig', [
            'form' => $form->createView(),
            'controller_name' => 'GroupsController',
            'session'   => $_SESSION['_sf2_attributes'],
        ]);
    }

    public function formGroup() {

    }
}
