<?php

namespace App\Controller;

use App\Entity\Residente;
use App\Form\ResidenteType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

class RegistroResidenteController extends AbstractController
{
    /**
     * @Route("/registro_residente", name="registro_residente")
     */
    public function index(Request $request,  SluggerInterface $slugger): Response
    {
        $residente = new Residente();
        $form = $this->createForm(ResidenteType::class,$residente);
        $form->handleRequest($request);
        if($form->isSubmitted() ){
            if($form->isValid()){
                //PREPARANDO IMAGEN
                $brochureFile = $form->get('foto')->getData();
                if ($brochureFile) {
                    $originalFilename = pathinfo($brochureFile->getClientOriginalName(), PATHINFO_FILENAME);
                    $safeFilename = $slugger->slug($originalFilename);
                    $newFilename = $safeFilename.'-'.uniqid().'.'.$brochureFile->guessExtension();
                    try {
                        $brochureFile->move(
                            $this->getParameter('imagenes_directory'),
                            $newFilename
                        );
                    } catch (FileException $e) {
                        throw new \Exception('¡Ups! Ha ocurrido un error, sorry');
                    }
                    $residente->setFoto($newFilename);
                }
                $em = $this->getDoctrine()->getManager();
                $em->persist($residente);
                $em->flush();
                $this->addFlash('success',Residente::REGISTRO_EXITO);
                return $this->redirectToRoute('registro_residente');
            }elseif(!$form->isValid()){
                $this->addFlash('error',Residente::REGISTRO_ERROR);
            }
        }
        return $this->render('registro_residente/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
