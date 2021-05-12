<?php

namespace App\Controller;

use App\Entity\Residente;
use App\Form\ResidenteType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RegistroResidenteController extends AbstractController
{
    /**
     * @Route("/registro_residente", name="registro_residente")
     */
    public function index(Request $request): Response
    {
        $residente = new Residente();
        $form = $this->createForm(ResidenteType::class,$residente);
        $form->handleRequest($request);
        if($form->isSubmitted() ){
            if($form->isValid()){
                $em = $this->getDoctrine()->getManager();
                $em->persist($residente);
                $em->flush();
                $this->addFlash('success','Residente registrado correctamente');
                return $this->redirectToRoute('registro_residente');
            }elseif(!$form->isValid()){
                $this->addFlash('error','Hubo Problemas al registrar al residente');
            }
        }
        return $this->render('registro_residente/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
