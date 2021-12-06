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
                foreach ($form_editar_tratamiento['horario']->getData() as $horario) {
                    switch ($horario) {
                        case 0:
                            $tratamiento->setDesayuno(1);
                            break;
                        case 1:
                            $tratamiento->setComida(1);
                            break;
                        case 2:
                            $tratamiento->setCena(1);
                            break;
                        case 3:
                            $tratamiento->setRecena(1);
                            break;
                    }
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
