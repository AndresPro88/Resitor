<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AntibioticoController extends AbstractController
{
    /**
     * @Route("/antibiotico", name="antibiotico")
     */
    public function index(): Response
    {
        return $this->render('antibiotico/index.html.twig', [
            'controller_name' => 'AntibioticoController',
        ]);
    }
}
