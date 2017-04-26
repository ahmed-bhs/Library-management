<?php

namespace Gt\ItBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('GtItBundle:Default:index.html.twig', array('name' => $name));
    }
}
