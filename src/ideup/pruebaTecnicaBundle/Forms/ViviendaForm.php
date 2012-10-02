<?php
    namespace ideup\pruebaTecnicaBundle\Forms;

    use Symfony\Component\Form\AbstractType;
    use Symfony\Component\Form\FormBuilderInterface;
    use Symfony\Component\OptionsResolver\OptionsResolverInterface;


    class ViviendaForm extends AbstractType
    {
        public function buildForm(FormBuilderInterface $builder, array $options)
        {
            
            $form = $builder
                ->add('descripcion_corta', 'text', array('label'=>'Descripción breve: ','max_length'=>'250'))
                ->add('precio', 'number', array('precision'=>2, 'label'=>'Precio: '))
                ->add('descripcion','textarea',array('label'=>'Descripción: '),array('cols'=>'25', 'rows'=>'5'))
                ->add('direccion', 'text', array('label'=>'Dirección: '))
               // ->add('imagenes', 'file', array('label'=> 'Imágenes: ','required'=>false))
                ->add('categoria_id','entity',array(
                    'class'=>'ideuppruebaTecnicaBundle:Categorias',
                    'label' => 'Categoría: ',
                    'expanded'=>false,
                    'multiple'=>false,

                ))
                ->getForm();
            
        }

        public function getName()
        {
            return 'NuevaVivienda';
        }
        
        public function setDefaultOptions(OptionsResolverInterface $resolver)
        {
            $resolver->setDefaults(array(
                'data_class' => 'ideup\pruebaTecnicaBundle\Entity\Vivienda',
            ));
        }
    }
?>
