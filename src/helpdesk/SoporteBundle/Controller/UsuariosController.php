<?php

namespace helpdesk\SoporteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use helpdesk\SoporteBundle\Form\Type\UsuarioType;
class UsuariosController extends Controller {

    public function listarAction() {
        $em = $this->getDoctrine()->getManager();
        $request = $this->getRequest();
        $paginator  = $this->get('knp_paginator');
        $form = $this->createFormBuilder()
            ->add('BtnEliminar', 'submit', array('label'  => 'Eliminar',))
            ->getForm();
        $form->handleRequest($request);
        // Eliminar registros
        if($form->isValid()) {
            $arrSeleccionados = $request->request->get('ChkSeleccionar');
            if(count($arrSeleccionados) > 0) {
                foreach ($arrSeleccionados AS $codigoUsuario) {
                    $arUsuario = new \helpdesk\SoporteBundle\Entity\SopUsuario();
                    $arUsuario = $em->getRepository('helpdeskSoporteBundle:SopUsuario')->find($codigoUsuario);
                    $em->remove($arUsuario);
                    $em->flush();
                }
            }
        }
        // Fin Eliminar registros
        $arUsuarios = new \helpdesk\SoporteBundle\Entity\SopUsuario();
        $query = $em->getRepository('helpdeskSoporteBundle:SopUsuario')->findAll();
        $arUsuarios = $paginator->paginate($query, $this->get('request')->query->get('page', 1),9);
              
        return $this->render('helpdeskSoporteBundle:Usuarios:listar.html.twig', array(
                    'arUsuarios' => $arUsuarios,
                    'form'=> $form->createView()
           
        ));
    }
   
 public function nuevoAction() {
        $em = $this->getDoctrine()->getManager();
        $request = $this->getRequest();
        $arUsuario = new \helpdesk\SoporteBundle\Entity\SopUsuario();
        $formUsuario = $this->createForm(new UsuarioType(), $arUsuario);
        $formUsuario->handleRequest($request);
        
        if ($formUsuario->isValid())
        {
            // guardar la tarea en la base de datos
            $em->persist($arUsuario);
            $arUsuario = $formUsuario->getData();
            $em->flush();
            return $this->redirect($this->generateUrl('helpdesk_usuarios_listar'));
        }
        
           
        
        return $this->render('helpdeskSoporteBundle:Usuarios:nuevo.html.twig', array(
            'formUsuario' => $formUsuario->createView(),
        ));
    }
    
public function editarAction($codigoUsuarioPk) {
        $em = $this->getDoctrine()->getManager();
        $request = $this->getRequest();
        $arUsuario = new \helpdesk\SoporteBundle\Entity\SopUsuario();
        $arUsuario = $em->getRepository('helpdeskSoporteBundle:SopUsuario')->find($codigoUsuarioPk);
        //$formUsuario = $this->createForm(new UsuarioType(), $arUsuario);
        $formUsuario = $this->createFormBuilder($arUsuario)        
            ->add('usuario','text', array('data' => $arUsuario->getusuario()))
            ->add('password','text', array('data' => $arUsuario->getpassword()))
            ->add('nombre','text', array('data' => $arUsuario->getnombre(), 'attr' => array('style' => 'width: 260px')))
            ->add('email','text', array('data' => $arUsuario->getemail(), 'attr' => array('style' => 'width: 260px')))
            ->add('fechac','date',array('data' => $arUsuario->getfechac()))   
            ->add('save', 'submit', array('label'  => 'Guardar'))
            ->getForm();
        $formUsuario->handleRequest($request);
        if ($formUsuario->isValid()) {
            // guardar la tarea en la base de datos
            $em->persist($arUsuario);
            $arUsuario = $formUsuario->getData();
            $em->flush();
            return $this->redirect($this->generateUrl('helpdesk_usuarios_listar'));
        }
        return $this->render('helpdeskSoporteBundle:usuarios:nuevo.html.twig', array(
            'formUsuario' => $formUsuario->createView(),
        ));
    }
}