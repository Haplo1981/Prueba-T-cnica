<?php

namespace ideup\pruebaTecnicaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use ideup\pruebaTecnicaBundle\Entity\Vivienda;
use Symfony\Component\HttpFoundation\Request;
use ideup\pruebaTecnicaBundle\Forms\ViviendaForm;

class DefaultController extends Controller
{
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $viviendas = $em->getRepository('ideuppruebaTecnicaBundle:Vivienda')
            ->findAllOrderedByPrecio();
        return $this->render('ideuppruebaTecnicaBundle:Default:index.html.twig', array(
            'viviendas' => $viviendas,
        ));
    }
    
    public function showAction($idVivienda){
        //$idVivienda = $request->query->get('id');
        
        $em = $this->getDoctrine()->getManager();
        $vivienda = $em->getRepository('ideuppruebaTecnicaBundle:Vivienda')
                ->find(array('id'=>$idVivienda));
        $form = $this->createForm(new ViviendaForm(),$vivienda);
        return $this->render('ideuppruebaTecnicaBundle:Default:nuevaVivienda.html.twig', array(
            'form' => $form->createView(),'vivienda'=>$vivienda
        ));
    }
    
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
                return $this->redirect($this->generateUrl('_homepage'));
            }
        }
        return $this->render('ideuppruebaTecnicaBundle:Default:nuevaVivienda.html.twig', array(
            'form' => $form->createView(),
        ));
    }
    
    public function updateAction(Request $request){
        
        $em = $this->getDoctrine()->getManager();
        
        $form = $this->createForm(new ViviendaForm());
        if ($request->getMethod()=="POST"){
            $form->bind($request);
            if($form->isValid()){
                $em->flush();
                return $this->redirect($this->generateUrl('_homepage'));
            }
        }
        return $this->redirect($this->generateUrl('_homepage'));
    }
}
?>
