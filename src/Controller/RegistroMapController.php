<?php

namespace App\Controller;

use App\Entity\MedicosMAP;
use App\Form\MapType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RegistroMapController extends AbstractController
{
    /**
     * @Route("/registro_map", name="registro_map")
     */
    public function index(Request $request): Response
    {
        $map = new MedicosMAP();
        $form = $this->createForm(MapType::class,$map);
        $form->handleRequest($request);
        if($form->isSubmitted()){
            if($form->isValid()){
                $em = $this->getDoctrine()->getManager();
                $em->persist($map);
                $em->flush();
                $this->addFlash('success','Medico MAP registrado correctamente');
                return $this->redirectToRoute('registro_map');
            }elseif(!$form->isValid()){
                $this->addFlash('error','Hubo Problemas al registrar al medico MAP');
            }
        }
        return $this->render('registro_map/index.html.twig', [
            'formulario' => $form->createView(),
        ]);
    }
}
