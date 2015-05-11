<?php

namespace helpdesk\SoporteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use helpdesk\SoporteBundle\Form\Type\SolicitudTipoType;
class SolicitudesTiposController extends Controller {

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
                foreach ($arrSeleccionados AS $codigoTipoSolicitud) {
                    $arSolicitudTipo = new \helpdesk\SoporteBundle\Entity\SopSolicitudTipo();
                    $arSolicitudTipo = $em->getRepository('helpdeskSoporteBundle:SopSolicitudTipo')->find($codigoTipoSolicitud);
                    $em->remove($arSolicitudTipo);
                    $em->flush();
                }
            }
        }
        $arSolicitudesTipos = new \helpdesk\SoporteBundle\Entity\SopSolicitudTipo();
        $arSolicitudesTipos = $em->getRepository('helpdeskSoporteBundle:SopSolicitudTipo')->findAll();

        return $this->render('helpdeskSoporteBundle:SolicitudesTipos:listar.html.twig', array(
                    'arSolicitudesTipos' => $arSolicitudesTipos,
                    'form'=> $form->createView()
           
        ));
    }
   
    

 public function nuevoAction() {
        $em = $this->getDoctrine()->getManager();
        $request = $this->getRequest();
        $arSolicitudTipo = new \helpdesk\SoporteBundle\Entity\SopSolicitudTipo();
        $formSolicitudTipo = $this->createForm(new SolicitudTipoType(), $arSolicitudTipo);
        $formSolicitudTipo->handleRequest($request);
        if ($formSolicitudTipo->isValid())
        {
            // guardar la tarea en la base de datos
            $em->persist($arSolicitudTipo);
            $arSolicitudTipo = $formSolicitudTipo->getData();
            $em->flush();
            return $this->redirect($this->generateUrl('helpdesk_solicitudestipos_listar'));
        }
        return $this->render('helpdeskSoporteBundle:SolicitudesTipos:nuevo.html.twig', array(
            'formSolicitudTipo' => $formSolicitudTipo->createView(),
        ));
    }
    
public function editarAction($codigoTipoSolicitudPk) {
        $em = $this->getDoctrine()->getManager();
        $request = $this->getRequest();
        $arSolicitudTipo = new \helpdesk\SoporteBundle\Entity\SopSolicitudTipo();
        $arSolicitudTipo = $em->getRepository('helpdeskSoporteBundle:SopSolicitudTipo')->find($codigoTipoSolicitudPk);
        $formSolicitudTipo = $this->createForm(new SolicitudTipoType(), $arSolicitudTipo);
        $formSolicitudTipo->handleRequest($request);
        if ($formSolicitudTipo->isValid()) {
            // guardar la tarea en la base de datos
            $em->persist($arSolicitudTipo);
            $arSolicitudTipo = $formSolicitudTipo->getData();
            $em->flush();
            return $this->redirect($this->generateUrl('helpdesk_solicitudestipos_listar'));
        }
        return $this->render('helpdeskSoporteBundle:solicitudestipos:nuevo.html.twig', array(
            'formSolicitudTipo' => $formSolicitudTipo->createView(),
        ));
    }
}