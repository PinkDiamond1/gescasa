<?php

namespace Gestor\MaterialBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;

class VestuarioType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options){
        $builder                
                ->add('descripcion','textarea',array(
                    'max_length'=>'255',
                    'label'     =>'Descripción:',
                    'required'  => false
                    ))
                ->add('tipo', 'entity', array(
                    'class'         => 'GestionBundle:infoTipoVestuario',
                    'empty_value'   => 'Seleccione el tipo',
                    'query_builder' => function(EntityRepository $er) {
                        return $er->createQueryBuilder('e')
                            ->orderBy('e.descripcion', 'ASC');
                    },
                    'label'         => 'Tipo:',
                    'required'      => true
                    ))  
                 ->add('marca','text',array(
                    'max_length'=>'255',
                    'label'     =>'Marca:',
                    'required'  => true
                    ))
                 ->add('modelo','text',array(
                    'max_length'=>'255',
                    'label'     =>'Modelo:',
                    'required'  => true
                    ))
                 ->add('talla','text',array(
                    'max_length'=>'20',
                    'label'     =>'Talla:',
                    'required'  => false
                    ))
                 ->add('color','text',array(
                    'max_length'=>'20',
                    'label'     =>'Color:',
                    'required'  => false
                    ))
                 ->add('sexo','choice',array(
                    'choices'   => array('Hombre' => 'Hombre', 'Mujer' => 'Mujer', 'Ambos' => 'Ambos'),
                    'label'     =>'Sexo:',
                    'required'  => false
                    ))                           
                 ->add('numserie','text',array(
                    'max_length'=>'40',
                    'label'     =>'N. Serie:',
                    'required'  => false
                    ))
                 ->add('destino','text',array(
                    'max_length'=>'255',
                    'label'     =>'Destino:',
                    'required'  => false
                    ))
                ->add('cantidad','integer',array(
                    'max_length'=>'200',
                    'label'=>'Cantidad:',
                    'required' => false
                    ))
                ->add('observaciones','textarea',array(
                    'max_length'=>'255',
                    'label'=>'Observaciones:',
                    'required' => false
                    ))      
         ;
    }
 
    public function setDefaultOptions(OptionsResolverInterface $resolver){
        $resolver->setDefaults(array(
            'data_class' => 'Gestor\MaterialBundle\Entity\MaterialVestuario'));
    }

    public function getName(){
        return 'gestor_materialbundle_materialVestuarioType';        
    }
}

