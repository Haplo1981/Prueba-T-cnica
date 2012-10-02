<?php

namespace ideup\pruebaTecnicaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use ideup\pruebaTecnicaBundle\Entity\Vivienda;
use Symfony\Component\HttpFoundation\Request;
use ideup\pruebaTecnicaBundle\Forms\ViviendaForm;

class DefaultController extends Controller
{
    public function newAction(Request $request){
        
        $vivienda = new Vivienda();
        $vivienda->setDescripcionCorta("Introduzca una descripción breve");
        $vivienda->setPrecio(0);
        $vivienda->setDescripcion("Describa su vivienda");

        $form = $this->createForm(new ViviendaForm(),$vivienda);
        if ($request->getMethod()=="POST"){
            $form->bind($request);
            if($form->isValid()){
                $em = $this->getDoctrine()->getManager();
                $em->persist($vivienda);
                $em->flush();
                return $this->redirect($this->generateUrl('task_success'));
            }
        }
        return $this->render('ideuppruebaTecnicaBundle:Default:nuevaVivienda.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}
?>
