<?php

namespace App\Controller;

use App\Entity\Utilisateur;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class LoginController extends Controller
{
    /**
     * @Route("/login", name="login")
     */
    public function index(Request $request)
    {
        if(isset($_SESSION['_sf2_attributes']['nom'])) {
            return $this->redirectToRoute('home');
        }

        $user = new Utilisateur();

        $form = $this->createFormBuilder()
            ->add('email_utilisateur', EmailType::class, [
                'attr' => ['class' => 'form-control fc-outline-dark','name' => 'mail','placeholder' => 'Adresse mail'],
                'required' => 'true',
            ])
            ->add('password_utilisateur', PasswordType::class, [
                'attr' => ['class' => 'form-control fc-outline-dark','name'=>'password','placeholder' => 'Mot de passe'],
                'required' => 'true',
            ])
            ->add('connexion', SubmitType::class, [
                'attr' => ['class' => 'btn btn-info btn-block','name' => 'password','type'=>'submit', 'value' => 'Connexion'],
            ])
            ->getForm();

        $form->handleRequest($request);

        icdf ($form->isSubmitted() && $form->isValid()) {
            $credentials = $form->getData();
            $hashedpass = hash('sha256',$credentials['password_utilisateur']);
            $repository = $this->getDoctrine()->getRepository(Utilisateur::class);

            if($repository != null) {
                //echo 'cas 1';
                $utilisateur = $repository->findOneBy([
                    'email_utilisateur' => $credentials['email_utilisateur'],
                    'password_utilisateur' => $hashedpass,
                ]);
                if($utilisateur != null) {
                    $session = new Session();
                    $session->set('nom', $utilisateur->getNomUtilisateur());
                    $session->set('prenom', $utilisateur->getPrenomUtilisateur());
                    $session->set('email', $utilisateur->getEmailUtilisateur());
                    $session->set('avatar', $utilisateur->getAvatarUtilisateur());
                    return $this->redirectToRoute('home');
                }
            }
            else
            {
                return $this->render('login/index.html.twig',array(
                    'form' => $form->createView(),
                    'errorMessage' => 'Identifiants invalides.'
                ));
            }
        }

        return $this->render('login/index.html.twig',array(
            'form' => $form->createView(),
        ));
    }
}
