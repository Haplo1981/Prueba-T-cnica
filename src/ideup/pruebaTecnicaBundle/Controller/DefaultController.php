<?php

namespace ideup\pruebaTecnicaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use ideup\pruebaTecnicaBundle\Entity\Vivienda;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function newAction(Request $request){
        
        $vivienda = new Vivienda();
        $vivienda->setDescripcionCorta("Introduzca una descripción breve");
        $vivienda->setPrecio(0);
        $vivienda->setDescripcion("Describa su vivienda");

        $form = $this->createFormBuilder($vivienda)
            ->add('descripcion_corta', 'text', array('label'=>'Descripción breve: ','max_length'=>'250'))
            ->add('precio', 'number', array('precision'=>2, 'label'=>'Precio: '))
            ->add('descripcion','textarea',array('label'=>'Descripción: '),array('cols'=>'25', 'rows'=>'5'))
            ->add('direccion', 'text', array('label'=>'Dirección: '))
            ->add('imagenes', 'file', array('label'=> 'Imágenes: '))
            ->getForm();
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
