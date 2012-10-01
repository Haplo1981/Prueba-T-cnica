<?php

namespace ideup\pruebaTecnicaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HelloController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('ideuppruebaTecnicaBundle:Hello:index.html.twig', array('name' => $name));
    }
}
