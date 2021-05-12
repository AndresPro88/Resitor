<?php

namespace App\Controller;

use App\Entity\Residente;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractController
{
    /**
     * @Route("/dashboard", name="dashboard")
     */
    public function index(): Response{
        $em = $this->getDoctrine()->getManager();
        $residentes = $em->getRepository(Residente::class)->BuscarTodosResidentes();
        return $this->render('dashboard/index.html.twig', [
            'residentes' => $residentes,
        ]);
    }
}
