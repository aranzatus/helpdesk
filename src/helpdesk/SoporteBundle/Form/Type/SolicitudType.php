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
            ->add('descripcion','text', array('required' => false))
            ->add('fecha','date')
            ->add('save', 'submit');
    }
 
    public function getName()
    {
        return 'solicitud';
    }
}
