<?php
// src/Form/TaskType.php
namespace App\form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class UtilisateurRegisterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('prenom_utilisateur', TextType::class, [
                'attr' => ['class' => 'form-control','name' => 'nom','placeholder' => 'Prénom'],
            ])

            ->add('nom_utilisateur', TextType::class ,[
                'attr' => ['class' => 'form-control','name' => 'prenom','placeholder' => 'Nom'],
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
            ]);
    }
}