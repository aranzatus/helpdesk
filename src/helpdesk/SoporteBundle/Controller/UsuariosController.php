<?php

namespace helpdesk\SoporteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use helpdesk\SoporteBundle\Form\Type\UsuarioType;
class UsuariosController extends Controller {

    public function listarAction() {
        $em = $this->getDoctrine()->getManager();
        $request = $this->getRequest();
        $form = $this->createFormBuilder()
            ->add('BtnEliminar', 'submit', array('label'  => 'Eliminar',))
            ->getForm();
        $form->handleRequest($request);
        if($form->isValid()) {
            $arrSeleccionados = $request->request->get('ChkSeleccionar');
            if(count($arrSeleccionados) > 0) {
                foreach ($arrSeleccionados AS $idUsuario) {
                    $arUsuario = new \helpdesk\SoporteBundle\Entity\SopUsuario();
                    $arUsuario = $em->getRepository('helpdeskSoporteBundle:SopUsuario')->find($idUsuario);
                    $em->remove($arUsuario);
                    $em->flush();
                }
            }
        }
        $arUsuarios = new \helpdesk\SoporteBundle\Entity\SopUsuario();
        $arUsuarios = $em->getRepository('helpdeskSoporteBundle:SopUsuario')->findAll();

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
    
public function editarAction($idUsuarioPk) {
        $em = $this->getDoctrine()->getManager();
        $request = $this->getRequest();
        $arUsuario = new \helpdesk\SoporteBundle\Entity\SopUsuario();
        $arUsuario = $em->getRepository('helpdeskSoporteBundle:SopUsuario')->find($idUsuarioPk);
        $formUsuario = $this->createForm(new UsuarioType(), $arUsuario);
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