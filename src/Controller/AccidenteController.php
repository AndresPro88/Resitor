<?php

namespace App\Controller;

use App\Entity\Accidente;
use App\Form\AccidenteType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccidenteController extends AbstractController
{
    /**
     * @Route("/accidente", name="accidente")
     */
    public function index(): Response
    {
        return $this->render('accidente/index.html.twig', [
            'controller_name' => 'AccidenteController',
        ]);
    }
    /**
     * @Route("/registro_accidente", name="registro_accidente")
     */
    public function registroAccidente(Request $request){
        $accidente = new Accidente();
        $form = $this->createForm(AccidenteType::class,$accidente);
        $form->handleRequest($request);
        if($form->isSubmitted() ){
            if($form->isValid()){
                $em = $this->getDoctrine()->getManager();
                $em->persist($accidente);
                $em->flush();
                $this->addFlash('success','Accidente registrado correctamente');
                return $this->redirectToRoute('registro_accidente');
            }elseif(!$form->isValid()){
                $this->addFlash('error','Hubo Problemas al registrar el Accidente');
            }
        }
        return $this->render('/accidente/registro_accidente.html.twig', [
            'form' => $form->createView(),
        ]);
    }
    /**
     * @Route("/listar_accidentes", name="listar_accidentes")
     */
    public function listarAccidentres(){
        $em = $this->getDoctrine()->getManager();
        $accidentes = $em->getRepository(Accidente::class)->findAll();
        return $this->render('/accidente/listar_accidentes.html.twig', [
            'accidentes' => $accidentes,
        ]);
    }
}
