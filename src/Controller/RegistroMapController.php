<?php

namespace App\Controller;

use App\Entity\MedicosMAP;
use App\Entity\Residente;
use App\Form\BorrarMapType;
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

        //LISTADO MEDICOS
        $medicos_map = $this->getDoctrine()->getRepository(MedicosMAP::class)->findAll();

        $map = new MedicosMAP();
        $form = $this->createForm(MapType::class,$map);
        $form->handleRequest($request);

        //AGREGAR MEDICO
        if($form->isSubmitted()){
            if($form->isValid()){
                $em = $this->getDoctrine()->getManager();
                $em->persist($map);
                $em->flush();
                $this->addFlash('success',MedicosMAP::REGISTRO_EXITO);
                return $this->redirectToRoute('registro_map');
            }elseif(!$form->isValid()){
                $this->addFlash('error',MedicosMAP::REGISTRO_ERROR);
            }
        }
        //BORRAR OBJETO MED_MAP
        $form_borrar = $this->createForm(BorrarMapType::class);
        $form_borrar->handleRequest($request);
        if($form_borrar->isSubmitted()){
            if($form_borrar->isValid()){
                $em = $this->getDoctrine()->getManager();
                $map_borrar = $this->getDoctrine()->getRepository(MedicosMAP::class)->find($form_borrar['med_map']->getData());
                $em->remove($map_borrar);
                $em->flush();
                $this->addFlash('delete_success',MedicosMAP::BORRADO_EXITO);
                return $this->redirectToRoute('registro_map');
            }elseif(!$form_borrar->isValid()){
                $this->addFlash('delete_error',MedicosMAP::BORRADO_ERROR);
            }
        }
        return $this->render('registro_map/index.html.twig', [
            'formulario' => $form->createView(),
            'formulario_borrar' => $form_borrar->createView(),
            'medicos' => $medicos_map,
        ]);
    }
    /**
     * @Route("/listado_pacientes/{id}", name="listado_pacientes")
     */
    public function listadoPacientes($id)
    {
        $medico = $this->getDoctrine()->getRepository(MedicosMAP::class)->find($id);
        $pacientes = $this->getDoctrine()->getRepository(Residente::class)->findBy(['med_map' => $id]);

        return $this->render('registro_map/listado_pacientes.html.twig', [
            'medico' => $medico,
            'pacientes' => $pacientes,
        ]);
    }
}
