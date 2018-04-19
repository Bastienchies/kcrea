<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class LogoutController extends Controller
{
    /**
     * @Route("/logout", name="logout")
     */
    public function index()
    {
        if(isset($_SESSION['_sf2_attributes']['nom'])) {
            $session = new Session();
            $session->clear();
            return $this->redirectToRoute('login', [
            ]);
        }
        return $this->redirectToRoute('login', [

        ]);
    }
}
