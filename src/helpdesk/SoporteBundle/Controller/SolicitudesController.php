<?php

namespace helpdesk\SoporteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SolicitudesController extends Controller {

    public function listarAction() {
        $em = $this->getDoctrine()->getManager();
        $arSolicitudes = new \helpdesk\SoporteBundle\Entity\SopSolicitud();
        $arSolicitudes = $em->getRepository('helpdeskSoporteBundle:SopSolicitud')->findAll();

        return $this->render('helpdeskSoporteBundle:Solicitudes:listar.html.twig', array(
                    'arSolicitudes' => $arSolicitudes
        ));
    }

}
