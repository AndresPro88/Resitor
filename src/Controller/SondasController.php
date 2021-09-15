<?php

namespace App\Controller;

use App\Entity\Sondas;
use App\Form\SondasType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SondasController extends AbstractController
{
    /**
     * @Route("/sondas", name="sondas")
     */
    public function index(): Response
    {
        return $this->render('sondas/index.html.twig', [
            'controller_name' => 'SondasController',
        ]);
    }
    /**
     * @Route("/registro_sondas", name="registro_sondas")
     */
    public function registroSondas(Request $request){
        $sonda = new Sondas();
        $form = $this->createForm(SondasType::class,$sonda);
        $form->handleRequest($request);
        if($form->isSubmitted() ){
            if($form->isValid()){
                $em = $this->getDoctrine()->getManager();
                $em->persist($sonda);
                $em->flush();
                $this->addFlash('success',Sondas::REGISTRO_EXITO);
                return $this->redirectToRoute('registro_sondas');
            }elseif(!$form->isValid()){
                $this->addFlash('error',Sondas::REGISTRO_ERROR);
            }
        }
        return $this->render('/sondas/registro_sondas.html.twig', [
            'form' => $form->createView(),
        ]);
    }
    /**
     * @Route("/listar_sondas", name="listar_sondas")
     */
    public function listarSondas(){
        $em = $this->getDoctrine()->getManager();
        $sondas = $em->getRepository(Sondas::class)->findAll();
        $tipos = ['Ninguno','Sonda vesical','Sonda uretral','Sonda rectal','Sonda nasogástrica','Sonda intestinal','Sonda de oxigeno'];
        return $this->render('/sondas/listar_sondas.html.twig', [
            'sondas' => $sondas,
            'tipos' => $tipos
        ]);
    }
}
