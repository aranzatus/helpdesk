<?php
namespace helpdesk\SoporteBundle\Form\Type;
 
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
 
class SolicitudTipoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            
            ->add('solicitudTipo', 'text', array('attr' => array('style' => 'width: 260px')))
            ->add('save', 'submit', array('label'  => 'Guardar'));
       
    }
 
    public function getName()
    {
        return 'solicitudtipo';
    }
}
