<?php

namespace App\Controller;

use App\Entity\Podologo;
use App\Form\PodologoType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RegistroPodologoController extends AbstractController
{
    /**
     * @Route("/registro_podologo", name="registro_podologo")
     */
    public function index(Request $request): Response
    {
        $pod = new Podologo();
        $form = $this->createForm(PodologoType::class,$pod);
        $form->handleRequest($request);
        if($form->isSubmitted()){
            if($form->isValid()){
                $em = $this->getDoctrine()->getManager();
                $em->persist($pod);
                $em->flush();
                $this->addFlash('success','Podologo/a registrado correctamente');
                return $this->redirectToRoute('registro_podologo');
            }elseif(!$form->isValid()){
                $this->addFlash('error','Hubo Problemas al registrar al Podologo/a');
            }
        }


        return $this->render('registro_podologo/index.html.twig', [
            'formPod' => $form->createView(),
        ]);
    }
}
