<?php
namespace helpdesk\SoporteBundle\Form\Type;
 
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
 
class UsuarioType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            
        ->add('usuario','text')
        ->add('password','text')
        ->add('nombre', 'text', array('attr' => array('style' => 'width: 260px')))
        ->add('email', 'text', array('attr' => array('class' => 'email-box', 'style' => 'width: 260px')))
        ->add('fechac','date', array('data' => new \ DateTime('now')))   
        ->add('save', 'submit', array('label'  => 'Guardar'));
       
    }
 
    public function getName()
    {
        return 'usuario';
    }
}
