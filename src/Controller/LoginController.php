<?php

namespace App\Controller;

use App\Entity\Utilisateur;
use Swift_Mailer;
use Swift_Message;
use Swift_SmtpTransport;
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

        //POUR L'OUBLIE DE MOT DE PASSE
        $formPwd = $this->createFormBuilder()
            ->add('email_forgot', EmailType::class, [
                'attr' => ['class' => 'form-control','name' => 'mail','placeholder' => 'Adresse mail'],
                'required' => 'true',
            ])
            ->add('email_send', SubmitType::class, [
                'attr' => ['class' => 'btn btn-primary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium','name' => 'emailSend','type'=>'submit', 'value' => 'Envoyer'],
            ])
            ->getForm();

        $formPwd->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {
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

        //POUR L'OUBLIE DE MOT DE PASSE
        if ($formPwd->isSubmitted() && $formPwd->isValid())
        {
            $mail = $formPwd->getData();
            var_dump($mail);
            $this->sendMail($mail['email_forgot']);
        }
        else
        {
            return $this->render('login/index.html.twig',array(
                'form' => $form->createView(),
                'formPwd' => $formPwd->createView(),
                'errorMessage' => 'Adresse mail invalide.'
            ));
        }


        return $this->render('login/index.html.twig',array(
            'form' => $form->createView(),
            'formPwd' => $formPwd->createView(),
        ));
    }

    public function sendMail($mailto)
    {
        // Create the Transport
        $transport = (new Swift_SmtpTransport('smtp.vivaldi.net', 587, 'tls'))
            ->setUsername('mytek')
            ->setPassword('epsijdoe123')
        ;

        // Create the Mailer using your created Transport
        $mailer = new Swift_Mailer($transport);

        // Create a message
        $message = (new Swift_Message('Réinitialisation de mot de passe.'))
            ->setFrom(['mytek@vivaldi.net' => 'MyTek'])
            ->setTo([$mailto, 'other@domain.org' => 'A name'])
            ->setBody('Here is the message itself')
        ;

        // Send the message
        $result = $mailer->send($message);

    }
}
