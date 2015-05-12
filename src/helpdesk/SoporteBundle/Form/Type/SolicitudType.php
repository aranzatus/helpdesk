<?php
namespace helpdesk\SoporteBundle\Form\Type;
 
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
 
class SolicitudType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('solitudTipoRel', 'entity', array('class' => 'helpdeskSoporteBundle:SopSolicitudTipo','property' => 'solicitudTipo'))
            ->add('usuarioRel', 'entity', array('class' => 'helpdeskSoporteBundle:SopUsuario','property' => 'nombre'))
            ->add('descripcion','textarea', array('required' => true))
            ->add('fecha','date',array('data' => new \ DateTime('now')))
            ->add('observaciones','hidden')
            ->add('estado','hidden',array('data'  => 'Activo'))   
            ->add('save', 'submit', array('label'  => 'Guardar'));
       
    }
 
    public function getName()
    {
        return 'solicitud';
    }
}
