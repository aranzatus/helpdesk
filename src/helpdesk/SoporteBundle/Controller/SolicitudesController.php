<?php

namespace helpdesk\SoporteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use helpdesk\SoporteBundle\Form\Type\SolicitudType;
class SolicitudesController extends Controller {

    public function listarAction() {
        $em = $this->getDoctrine()->getManager();
        $request = $this->getRequest(); // captura o recupera datos del formulario
        $form = $this->createFormBuilder() //
            ->add('BtnEliminar', 'submit', array('label'  => 'Eliminar'))
            ->getForm(); 
        $form->handleRequest($request);
        if($form->isValid()) {
            $arrSeleccionados = $request->request->get('ChkSeleccionar');
            if(count($arrSeleccionados) > 0) {
                foreach ($arrSeleccionados AS $codigoSolicitud) {
                    $arSolicitud = new \helpdesk\SoporteBundle\Entity\SopSolicitud();
                    $arSolicitud = $em->getRepository('helpdeskSoporteBundle:SopSolicitud')->find($codigoSolicitud);
                    $em->remove($arSolicitud);
                    $em->flush();
                }
            }
        }
        $arSolicitudes = new \helpdesk\SoporteBundle\Entity\SopSolicitud();
        $arSolicitudes = $em->getRepository('helpdeskSoporteBundle:SopSolicitud')->findAll();

        return $this->render('helpdeskSoporteBundle:Solicitudes:listar.html.twig', array(
                    'arSolicitudes' => $arSolicitudes,
                    'form'=> $form->createView()
           
        ));
    }
    public function nuevoAction() {
        $em = $this->getDoctrine()->getManager();
        $request = $this->getRequest();
        $arSolicitud = new \helpdesk\SoporteBundle\Entity\SopSolicitud();
        $formSolicitud = $this->createForm(new SolicitudType(), $arSolicitud);
        $formSolicitud->handleRequest($request);
        if ($formSolicitud->isValid())
        {
            // guardar la tarea en la base de datos
            $em->persist($arSolicitud);
            $arSolicitud = $formSolicitud->getData();
            $em->flush();
            return $this->redirect($this->generateUrl('helpdesk_solicitudes_listar'));
        }
        return $this->render('helpdeskSoporteBundle:Solicitudes:nuevo.html.twig', array(
            'formSolicitud' => $formSolicitud->createView(),
        ));
    }
    public function editarAction($codigoSolicitudPk) {
        $em = $this->getDoctrine()->getManager();
        $request = $this->getRequest();
        $arSolicitud = new \helpdesk\SoporteBundle\Entity\SopSolicitud();
        $arSolicitud = $em->getRepository('helpdeskSoporteBundle:SopSolicitud')->find($codigoSolicitudPk);
        //$formSolicitud = $this->createForm(new SolicitudType(), $formSolicitud);
        $formSolicitud = $this->createFormBuilder($arSolicitud)        
            ->add('solitudTipoRel', 'entity', array('class' => 'helpdeskSoporteBundle:SopSolicitudTipo','property' => 'solicitudTipo'))
            ->add('usuarioRel', 'entity', array('class' => 'helpdeskSoporteBundle:SopUsuario','property' => 'nombre'))
            ->add('descripcion','textarea', array('required' => false))
            ->add('fecha','date')
            ->add('observaciones','hidden')
            ->add('estado','hidden',array('data'  => 'Activo'))   
            ->add('save', 'submit', array('label'  => 'Guardar'))
            ->getForm();
        $formSolicitud->handleRequest($request);
        if ($formSolicitud->isValid()) {
            // guardar la tarea en la base de datos
            $em->persist($arSolicitud);
            $arSolicitud = $formSolicitud->getData();
            $em->flush();
            return $this->redirect($this->generateUrl('helpdesk_solicitudes_listar'));
        }
        return $this->render('helpdeskSoporteBundle:Solicitudes:nuevo.html.twig', array(
            'formSolicitud' => $formSolicitud->createView(),
        ));
    }
    
    public function SolucionAction($codigoSolicitudPk) {
        $em = $this->getDoctrine()->getManager();
        $request = $this->getRequest();
        $arSolucion = new \helpdesk\SoporteBundle\Entity\SopSolicitud();
        $arSolucion = $em->getRepository('helpdeskSoporteBundle:SopSolicitud')->find($codigoSolicitudPk);
        $fe = new \DateTime('now');
        $form = $this->createFormBuilder()
            ->add('TxtSolucion', 'textarea', array('data' => $arSolucion->getObservaciones()))
            ->add('fechaSolucion','date',array('data' => $arSolucion->getFechaSolucion()))
            ->add('estado', 'choice', array('choices' => array('Activo' => 'Activo','Cerrado'=>'Cerrado')))
            ->add('save', 'submit', array('label' => 'Guardar'))    
            ->getForm();
        $form->handleRequest($request);
        
        
        if ($form->isValid())
        {
            // guardar la tarea en la base de datos           
            if ($form->get('TxtSolucion') == "")
            {
                echo $mensaje= "No";
            }
            else
            {
              $arSolucion->setObservaciones($form->get('TxtSolucion')->getData());
              $arSolucion->setfechaSolucion($form->get('fechaSolucion')->getData());
              $arSolucion->setestado($form->get('estado')->getData());
              $em->persist($arSolucion);
              $em->flush();
              return $this->redirect($this->generateUrl('helpdesk_solicitudes_listar'));  
            }    
            
                        
        }
        return $this->render('helpdeskSoporteBundle:Solicitudes:solucion.html.twig', array(
            'form'=> $form->createView(), 
            'arSolucion'=> $arSolucion,
            
        ));
    }
    
    
   

}
