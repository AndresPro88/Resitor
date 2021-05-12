<?php

namespace App\Controller;

use App\Entity\MedicosMAP;
use App\Entity\Podologo;
use App\Entity\Residente;
use App\Form\ResidenteType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ResidenteController extends AbstractController
{
    /**
     * @Route("/residente", name="residente")
     */
    public function index(): Response
    {
        return $this->render('residente/index.html.twig', [
            'controller_name' => 'ResidenteController',
        ]);
    }

    /**
     * @Route("/ver_residente/{id}", name="ver_residente")
     */
    public function verResidente($id){
        $em = $this->getDoctrine()->getManager();
        $residente = $em->getRepository(Residente::class)->find($id);
        return $this->render('residente/verResidente.html.twig',['residente'=>$residente]);
    }

    /**
     * @Route("/editar_residente/{id}", name="editar_residente")
     */
    public function editarResidente($id,Request $request){

        $residente = $this->getDoctrine()->getRepository(Residente::class)->find($id);
        $form_editar = $this->createForm(ResidenteType::class,$residente);
        $form_editar->handleRequest($request);
        if($form_editar->isSubmitted()) {
            if ($form_editar->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->flush();
                $this->addFlash('success', 'Residente editado correctamente');
                return $this->redirectToRoute('editar_residente/{id}');
            } elseif (!$form_editar->isValid()) {
                $this->addFlash('error', 'Hubo Problemas al editar al residente');
            }
        }
        return $this->render('residente/editarResidente.html.twig', [
            'form' => $form_editar->createView(),
            'residente' => $residente
        ]);
    }
}
