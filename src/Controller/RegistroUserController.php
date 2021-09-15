<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
class RegistroUserController extends AbstractController
{
    /**
     * @Route("/registro_user", name="registro_user")
     */
    public function index(Request $request,UserPasswordEncoderInterface $passwordEncoder): Response
    {

        $user = new User();
        $form_resgistro_user = $this->createForm(UserType::class,$user);
        $form_resgistro_user->handleRequest($request);
        if($form_resgistro_user->isSubmitted() && $form_resgistro_user->isValid()){
            $em = $this->getDoctrine()->getManager();
            $user->setRoles(['ROLE_USER']);
            $user->setPassword($passwordEncoder->encodePassword($user,$form_resgistro_user['password']->getData()));
            $em->persist($user);
            $em->flush();
            $this->addFlash('success',User::REGISTRO_EXITO);
            return $this->redirectToRoute('registro_user');
        }
        return $this->render('registro_user/index.html.twig', [
            'form_registro_user' => $form_resgistro_user->createView(),
        ]);
    }
}
