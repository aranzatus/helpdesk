<?php
namespace helpdesk\SoporteBundle\Form\Type;
 
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
 
class SolicitudType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            
            ->add('codigoUsuarioFk','text')
            ->add('asunto','text')
            ->add('descripcion','textarea', array('required' => false))
            ->add('fecha','date')
            ->add('observaciones','hidden')
            ->add('estado','hidden',array('data'  => 'Activo'))   
            ->add('save', 'submit', array('label'  => 'Guardar'));
       
    }
 
    public function getName()
    {
        return 'solicitud';
    }
}
