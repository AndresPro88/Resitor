<?php

namespace App\Controller;

use App\Entity\Contacto;
use App\Form\ContactoType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactoController extends AbstractController
{
    /**
     * @Route("/contacto", name="contacto")
     */
    public function index(): Response
    {
        return $this->render('contacto/index.html.twig', [
            'controller_name' => 'ContactoController',
        ]);
    }
    /**
     * @Route("/registro_contacto", name="registro_contacto")
     */
    public function registroContacto(Request $request){
        $contacto = new Contacto();
        $form_contacto = $this->createForm(ContactoType::class,$contacto);
        $form_contacto->handleRequest($request);
        if($form_contacto->isSubmitted() ){
            if($form_contacto->isValid()){
                $em = $this->getDoctrine()->getManager();
                $em->persist($contacto);
                $em->flush();
                $this->addFlash('success',Contacto::REGISTRO_EXITO);
                return $this->redirectToRoute('registro_contacto');
            }elseif(!$form_contacto->isValid()){
                $this->addFlash('error',Contacto::REGISTRO_ERROR);
            }
        }
        return $this->render('/contacto/registro_contacto.html.twig', [
            'form_contacto' => $form_contacto->createView(),
        ]);
    }
}
