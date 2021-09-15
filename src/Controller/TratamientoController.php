<?php

namespace App\Controller;

use App\Entity\Residente;
use App\Entity\Tratamiento;
use App\Form\TratamientoType;
use phpDocumentor\Reflection\Types\Integer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TratamientoController extends AbstractController
{
    /**
     * @Route("/tratamiento", name="tratamiento")
     */
    public function index(): Response
    {
        return $this->render('tratamiento/index.html.twig', [
            'controller_name' => 'TratamientoController',
        ]);
    }

    /**
     * @Route("/ver_residente/{id}/editar_tratamiento/{id_tratamiento}", name="editar_tratamiento_residente")
     */
    public function editarTratamiento($id,$id_tratamiento, Request $request): Response{

        $residente = $this->getDoctrine()->getRepository(Residente::class)->find($id);
        $tratamiento = $this->getDoctrine()->getRepository(Tratamiento::class)->find($id_tratamiento);
        $form_editar_tratamiento = $this->createForm(TratamientoType::class,$tratamiento);
        $form_editar_tratamiento->handleRequest($request);
        if($form_editar_tratamiento->isSubmitted()) {
            if ($form_editar_tratamiento->isValid()) {
                if(in_array(0,$form_editar_tratamiento['horario']->getData())){
                    $tratamiento->setDesayuno(1);
                }else{
                    $tratamiento->setDesayuno(0);
                }
                if (in_array(1,$form_editar_tratamiento['horario']->getData())){
                    $tratamiento->setComida(1);
                }else{
                    $tratamiento->setComida(0);
                }
                if(in_array(2,$form_editar_tratamiento['horario']->getData())){
                    $tratamiento->setCena(1);
                }else{
                    $tratamiento->setCena(0);
                }
                if (in_array(3,$form_editar_tratamiento['horario']->getData())){
                    $tratamiento->setRecena(1);
                }else{
                    $tratamiento->setRecena(0);
                }
                $em = $this->getDoctrine()->getManager();
                $em->flush();
                $this->addFlash('success_editar_tratamiento', Tratamiento::REGISTRO_EXITO);
                return $this->redirectToRoute('ver_residente',['id'=>$id]);
            } elseif (!$form_editar_tratamiento->isValid()) {
                $this->addFlash('error_editar_tratamiento', Tratamiento::REGISTRO_ERROR);
            }
        }
        return $this->render('tratamiento/editar_tratamiento.html.twig',[
            'tratamiento' =>  $tratamiento,
            'residente'=>$residente,
            'form_editar_tratamiento' => $form_editar_tratamiento->createView(),
        ]);
    }
}
