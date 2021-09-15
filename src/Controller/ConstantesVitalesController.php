<?php

namespace App\Controller;

use App\Entity\ConstantesVitales;
use App\Entity\Residente;
use App\Form\ConstantesVitalesType;
use phpDocumentor\Reflection\Types\Integer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ConstantesVitalesController extends AbstractController
{
    /**
     * @Route("/constantes/vitales", name="constantes_vitales")
     */
    public function index(): Response
    {
        return $this->render('constantes_vitales/index.html.twig', [
            'controller_name' => 'ConstantesVitalesController',
        ]);
    }
    /**
     * @Route("/registro_constantes/{id}", name="registro_constantes")
     */
    public function registroConstantes(Request $request,$id){
        $constantes = new ConstantesVitales();
        $form = $this->createForm(ConstantesVitalesType::class,$constantes);
        $form->handleRequest($request);
        if($form->isSubmitted() ){
            if($form->isValid()){
                $em = $this->getDoctrine()->getManager();
                $residente = $em->getRepository(Residente::class)->find($id);
                $constantes->setResidente($id);
                $em->persist($constantes);
                $em->flush();
                $this->addFlash('success',ConstantesVitales::REGISTRO_EXITO);
                return $this->redirectToRoute('ver_residente/'.$id);
            }elseif(!$form->isValid()){
                $this->addFlash('error',ConstantesVitales::REGISTRO_ERROR);
            }
        }
        return $this->render('/constantes_vitales/registro_constantes.html.twig', [
            'form_constantes' => $form->createView(),
        ]);
    }
}
