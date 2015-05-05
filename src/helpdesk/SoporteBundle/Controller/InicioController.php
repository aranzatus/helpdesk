<?php

namespace helpdesk\SoporteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class InicioController extends Controller
{
    public function inicioAction()
    {
        return $this->render('helpdeskSoporteBundle:Default:inicio.html.twig');
    }
}
