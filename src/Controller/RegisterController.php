<?php

namespace App\Controller;


use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class RegisterController extends Controller
{
    /**
     * @Route("/register", name="register")
     */
    public function index()
    {
        $form = $this->createFormBuilder()
            ->add('firstname', TextType::class ,[
                'attr' => ['class' => 'form-control','name' => 'password','placeholder' => 'Prénom'],
                ])
            ->add('lastname', TextType::class, [
                'attr' => ['class' => 'form-control','name' => 'password','placeholder' => 'Nom'],
            ])
            ->add('mail', EmailType::class, [
                'attr' => ['class' => 'form-control','name' => 'password','placeholder' => 'Adresse mail'],
            ])
            ->add('password', PasswordType::class, [
                'attr' => ['class' => 'form-control','name' => 'password','placeholder' => 'Mot de passe'],
            ])
            ->add('enregistrement', SubmitType::class, [
                'attr' => ['class' => 'btn btn-info btn-block','name' => 'password','type'=>'submit', 'value' => 'Enregistrement'],
            ])
            ->getForm();


        return $this->render('register/index.html.twig', [
            'controller_name' => 'RegisterController',
            'form' => $form->createView(),
        ]);
    }
}
