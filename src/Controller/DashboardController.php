<?php

namespace App\Controller;

use App\Entity\Residente;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

class DashboardController extends AbstractController
{
    /**
     * @Route("/dashboard", name="dashboard")
     */
    public function index(): Response{
//        $this->denyAccessUnlessGranted('ROLE_USER', null, 'Estas intentando acceder sin logearte');
        $em = $this->getDoctrine()->getManager();
        $residentes = $em->getRepository(Residente::class)->findAll();
        return $this->render('dashboard/index.html.twig', [
            'residentes' => $residentes,
        ]);
    }
}
