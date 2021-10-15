<?php

namespace App\Controller;

use App\Entity\Antibiotico;
use App\Entity\ConstantesVitales;
use App\Entity\ConsultaExterna;
use App\Entity\MedicosMAP;
use App\Entity\Podologo;
use App\Entity\Residente;
use App\Entity\SegEnfermeria;
use App\Entity\Tratamiento;
use App\Form\AntibioticoType;
use App\Form\ConstantesVitalesType;
use App\Form\ConsultaExternaType;
use App\Form\ResidenteType;
use App\Form\SegEnfermeriaType;
use App\Form\TratamientoType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\Validator\Constraints\DateTime;

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
    public function verResidente(Request $request,$id){
        $this->denyAccessUnlessGranted('ROLE_USER', null, 'Estas intentando acceder sin logearte');
        $em = $this->getDoctrine()->getManager();
        $residente = $em->getRepository(Residente::class)->find($id);

        //DECLARANDO OBJETOS DE CLASES CONSTANTES VITALES
        $constantes = new ConstantesVitales();
        $form_constantes = $this->createForm(ConstantesVitalesType::class,$constantes);
        $form_constantes->handleRequest($request);
        //DECLARANDO OBJETOS DE CLASES SEGUIMIENTO ENFERMERIA
        $seguimientoE = new SegEnfermeria();
        $form_segui = $this->createForm(SegEnfermeriaType::class,$seguimientoE);
        $form_segui->handleRequest($request);
        //DECLARANDO OBJETO DE CLASE CONSULTAEXTERNA
        $consulExt = new ConsultaExterna();
        $form_consultaEx =  $this->createForm(ConsultaExternaType::class, $consulExt);
        $form_consultaEx->handleRequest($request);
        //DECLARANDO OBJETOS CLASE ANTIBIOTICOS
        $antibiotico = new Antibiotico();
        $form_antibiotico = $this->createForm(AntibioticoType::class,$antibiotico);
        $form_antibiotico->handleRequest($request);
        //DECLARANDO OBJETO CLASE TRATAMIENTO
        $tratamiento = new Tratamiento();
        $form_tratamiento = $this->createForm(TratamientoType::class,$tratamiento);
        $form_tratamiento -> handleRequest($request);
        //OBTENIENDO ARRAY CON LAS CONSTANTES VITALES DE UN PACIENTE EN CONCRETO
        $constantesTotales = $em->getRepository(ConstantesVitales::class)->findBy(['residente' => $id]);

        //ENVIO DE FORMULARIO DE ANTIBIOTICO
        if($form_antibiotico->isSubmitted() ){
            if($form_antibiotico->isValid()){
                $em = $this->getDoctrine()->getManager();
                $antibiotico->setResidente($residente);
                $em->persist($antibiotico);
                $em->flush();
                $this->addFlash('success_antibiotico',Antibiotico::REGISTRO_EXITO);
            }elseif(!$form_antibiotico->isValid()){
                $this->addFlash('error_antibiotico',Antibiotico::REGISTRO_ERROR);
            }
        }
        //ENVIO DE FORMULARIO DE TRATAMIENTO
        if($form_tratamiento->isSubmitted() ){
            if($form_tratamiento->isValid()){
                $em = $this->getDoctrine()->getManager();
                $tratamiento->setResidente($residente);
                $tratamiento->setFecha(new \DateTime());
                //$tratamiento->setHorario(implode(",",$form_tratamiento['horario']->getData()));
                if(in_array(0,$form_tratamiento['horario']->getData())){
                    $tratamiento->setDesayuno(1);
                }else{
                    $tratamiento->setDesayuno(0);
                }
                if (in_array(1,$form_tratamiento['horario']->getData())){
                    $tratamiento->setComida(1);
                }else{
                    $tratamiento->setComida(0);
                }
                if(in_array(2,$form_tratamiento['horario']->getData())){
                    $tratamiento->setCena(1);
                }else{
                    $tratamiento->setCena(0);
                }
                if (in_array(3,$form_tratamiento['horario']->getData())){
                    $tratamiento->setRecena(1);
                }else{
                    $tratamiento->setRecena(0);
                }
                $em->persist($tratamiento);
                $em->flush();
                $this->addFlash('success_tratamiento',Tratamiento::REGISTRO_EXITO);
            }elseif(!$form_tratamiento->isValid()){
                $this->addFlash('error_tratamiento',Tratamiento::REGISTRO_ERROR);
            }
        }

        //ENVIO DEL FORMULARIO DE CONSULTA EXTERNA
        if($form_consultaEx->isSubmitted() ){
            if($form_consultaEx->isValid()){
                $em = $this->getDoctrine()->getManager();
                $consulExt->setResidente($residente);
                $em->persist($consulExt);
                $em->flush();
                $this->addFlash('success_consulta',ConsultaExterna::REGISTRO_EXITO);
            }elseif(!$form_consultaEx->isValid()){
                $this->addFlash('error_consulta',ConsultaExterna::REGISTRO_ERROR);
            }
        }
        //ENVIO DEL FORMULARIO DE AÑADIR CONSTANTES VITALES
        if($form_constantes->isSubmitted() ){
            if($form_constantes->isValid()){
                if(!preg_match("/\d{2,3}sy\/\d{2,3}$/",$form_constantes['tension_arterial']->getData())){
                    $this->addFlash('error','El valor de Tension arterial introducido no es correcto');
                }else{
                    $em = $this->getDoctrine()->getManager();
                    $constantes->setResidente($residente);
                    $constantes->setFechaCons(new \DateTime());
                    $em->persist($constantes);
                    $em->flush();
                    $this->addFlash('success',ConstantesVitales::REGISTRO_EXITO);
                }
            }elseif(!$form_constantes->isValid()){
                $this->addFlash('error',ConstantesVitales::REGISTRO_ERROR);
            }
        }
        //ENVIO DEL FORMULARIO DE AÑADIR SEGUIMIENTO DE ENFERMERIA
        if($form_segui->isSubmitted() ){
            if($form_segui->isValid()){
                $em = $this->getDoctrine()->getManager();
                $seguimientoE->setResidente($residente);
                $seguimientoE->setFechaSeguimiento(new \DateTime());
                $em->persist($seguimientoE);
                $em->flush();
                $this->addFlash('success',SegEnfermeria::REGISTRO_EXITO);
            }elseif(!$form_segui->isValid()){
                $this->addFlash('error',SegEnfermeria::REGISTRO_ERROR);
            }
        }
        return $this->render('residente/verResidente.html.twig',[
            'form_tratamiento' => $form_tratamiento->createView(),
            'form_antibiotico' => $form_antibiotico->createView(),
            'form_segui' => $form_segui->createView(),
            'form_constantes' => $form_constantes->createView(),
            'form_consultaExt' => $form_consultaEx->createView(),
            'constantesTotales' => $constantesTotales,
            'residente'=>$residente,
        ]);
    }

    /**
     * @Route("/editar_residente/{id}", name="editar_residente")
     */
    public function editarResidente($id,Request $request,SluggerInterface $slugger){

        $residente = $this->getDoctrine()->getRepository(Residente::class)->find($id);

        $form_editar = $this->createForm(ResidenteType::class,$residente);
        $form_editar->handleRequest($request);

        if($form_editar->isSubmitted()) {
            if ($form_editar->isValid()) {
                $brochureFile = $form_editar->get('foto')->getData();
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
                $em->flush();
                $this->addFlash('success', 'Residente editado correctamente');
                return $this->redirectToRoute('editar_residente',['id'=>$id]);
            } elseif (!$form_editar->isValid()) {
                $this->addFlash('error', 'Hubo Problemas al editar al residente');
            }
        }

        return $this->render('residente/editarResidente.html.twig', [
            'form' => $form_editar->createView(),
            'residente' => $residente
        ]);
    }

    /**
     * @Route("/listar_diabetes", name="listar_diabetes")
     */
    public function listarDiabetes(){
        $em = $this->getDoctrine()->getManager();
        $residentes = $em->getRepository(Residente::class)->buscarDiabetes();
        return $this->render('residente/listarDiabetes.html.twig', [
            'listado_diabetes' => $residentes
            ]);
    }
    /**
     * @Route("/consultar_dni", name="consultar_dni")
     */
    public function consultarDni(Request $request){
        if($request->isXmlHttpRequest()){
            $existe=true;
            $em = $this->getDoctrine()->getManager();
            $dni = $request->request->get('dni');
            $residente = $em->getRepository(Residente::class)->findOneBy( ['dni'=>$dni]);
            if (empty($residente)){
                $existe = false;
            }
            return new JsonResponse(['existe' => $existe , 'dni' => $dni]);
        }else{
            throw new \Exception('Aiuda, me esta jaquiando!!!');
        }
    }
}

//if ($residente->getDni() == $dni){
//    $existe = true;
//}
