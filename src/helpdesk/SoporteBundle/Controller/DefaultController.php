<?php

namespace helpdesk\SoporteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        $srtFrase = 'Esta es la frase del día: "AprendiendoSymfony"';
        return $this->render('helpdeskSoporteBundle:Default:index.html.twig', array('name' => $srtFrase));
    }
}
