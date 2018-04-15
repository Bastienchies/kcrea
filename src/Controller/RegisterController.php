<?php

namespace App\Controller;


use App\Entity\Utilisateur;
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

class RegisterController extends Controller
{
    /**
     * @Route("/register", name="register")
     */
    public function index(Request $request)
    {
        $request->getSession()->getFlashBag()->clear();

        $user = new Utilisateur();

        $form = $this->createFormBuilder($user)
            ->add('nom_utilisateur', TextType::class ,[
                'attr' => ['class' => 'form-control','name' => 'password','placeholder' => 'Prénom'],
                ])
            ->add('prenom_utilisateur', TextType::class, [
                'attr' => ['class' => 'form-control','name' => 'password','placeholder' => 'Nom'],
            ])
            ->add('email_utilisateur', EmailType::class, [
                'attr' => ['class' => 'form-control','name' => 'password','placeholder' => 'Adresse mail'],
            ])
            ->add('password_utilisateur', RepeatedType::class, array(
                'type' => PasswordType::class,
                'invalid_message' => 'Les mots de passe doivent correspondre.',
                'options' => array('attr' => array('class' => 'password-field')),
                'required' => true,
                'first_options'  => array('attr'=>['class' => 'form-control','placeholder' => 'Mot de passe']),
                'second_options' => array('attr'=>['class' => 'form-control','placeholder' => 'Confirmer le mot de passe']),
            ))
            ->add('enregistrement', SubmitType::class, [
                'attr' => ['class' => 'btn btn-info btn-block','name' => 'password','type'=>'submit', 'value' => 'Enregistrement'],
            ])
            ->getForm();

        $form->handleRequest($request);
        var_dump($request->getSession()->getFlashBag());
        if ($form->isSubmitted() && $form->isValid()) {

            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $user = $form->getData();
            /*$hashedpass = hash('sha256',$user->getPasswordUtilisateur());
            $user->setPasswordUtilisateur($hashedpass);
            $user->setAvatarUtilisateur('default_avatar.jpg');
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();*/

            $request->getSession()
                ->getFlashBag()
                ->add('success-register-msg', 'Inscription effectué, un mail de confirmation vous a été envoyé!')
            ;
            $request->getSession()->getFlashBag()->add('success-register-name', $user->getPrenomUtilisateur() .' '. $user->getNomUtilisateur());
            $request->getSession()->getFlashBag()->add('success-register-mail' , $user->getEmailUtilisateur());
            $request->getSession()->getFlashBag()->clear();

            //return $this->redirectToRoute('task_success');
        }
        return $this->render('register/index.html.twig', [
            'controller_name' => 'RegisterController',
            'form' => $form->createView(),
        ]);
    }
}
