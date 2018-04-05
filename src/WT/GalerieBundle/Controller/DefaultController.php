<?php

namespace WT\GalerieBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('WTGalerieBundle:Default:index.html.twig');
    }
}
