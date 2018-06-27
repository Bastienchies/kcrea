<?php

namespace App\Controller;

use Symfony\Component\Debug\Debug;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
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
                'attr' => ['class' => 'custom-file-input','id'=>'file','name' => 'mail'],
                'required' => 'true',
            ])/*
            <label class="custom-file">
  <input type="file" id="file" class="custom-file-input">
  <span class="custom-file-control"></span>
</label>*/
            ->add('connexion', SubmitType::class, [
                'attr' => ['class' => 'btn btn-info btn-block','name' => 'password','type'=>'submit', 'value' => 'Connexion'],
            ])
            ->getForm();


        return $this->render('profile/index.html.twig', [
            'controller_name' => 'ProfileController',
            'formAvatar' => $formAvatar->createView(),
        ]);
    }
}
