<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class GroupsController extends Controller
{
    /**
     * @Route("/groups", name="groups")
     */
    public function index()
    {
        return $this->render('groups/index.html.twig', [
            'controller_name' => 'GroupsController',
        ]);
    }
}
