<?php

namespace App\Controller;

use App\Entity\Utilisateur;
use Symfony\Component\Debug\Debug;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ProfileController extends Controller
{
    /**
     * @Route("/profile", name="profile")
     */
    public function index(Request $request)
    {


        $formAvatar = $this->createFormBuilder()
            ->add('avatar_utilisateur', FileType::class, [
                'label' => '',
                'attr' => ['class' => 'form-control','id'=>'file','name' => 'mail','onchange' => 'previewAvatar(this);'],
                'required' => 'true',
            ])
            ->add('valider', SubmitType::class, [
                'attr' => ['class' => 'btn btn-info btn-block','name' => 'password','type'=>'submit', 'value' => 'Valider'],
            ])
            ->getForm();

        if($request->isMethod("POST"))
        {
            $formAvatar->handleRequest($request);

            if ($formAvatar->isSubmitted() && $formAvatar->isValid()) {

                $session = new Session();

                // $file stores the uploaded PDF file
                /** @var Symfony\Component\HttpFoundation\File\UploadedFile $file */
                $file = $formAvatar["avatar_utilisateur"]->getData();

                $fileName = $session->get("id") . '.' . $file->guessExtension();

                // moves the file to the directory where brochures are stored
                $file->move(
                    $this->getParameter('avatars_directory'),
                    $fileName
                );

                $entityManager = $this->getDoctrine()->getManager();
                $user = $this->getDoctrine()->getRepository(Utilisateur::class)->find($session->get("id"));
                $user->setAvatarUtilisateur($fileName);
                $entityManager->persist($user);

                $session->set("avatar",$fileName);

                // updates the 'brochure' property to store the PDF file name
                // instead of its contents

                // ... persist the $product variable or any other work
            }
        }

        return $this->render('profile/index.html.twig', [
            'controller_name' => 'ProfileController',
            'formAvatar' => $formAvatar->createView(),
        ]);
    }

    public function changeAvatar(Request $request)
    {
    }
}
