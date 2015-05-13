<?php
namespace helpdesk\SoporteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection; 
/**
 * @ORM\Entity
 * @ORM\Table(name="sop_usuario")
 */
class SopUsuario 
{
   
    /**
     *
     * @ORM\Column(type="integer", name="codigo_usuario_pk")
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Id
     */
    protected $codigoUsuarioPk;
    
    /**
     * @ORM\Column(type="integer", name="usuario", unique=true)
     */
    protected $usuario;
    
    /**
     * @ORM\Column(type="string", length=20, name="password")
     */
    protected $password;
    
    /**
     * @ORM\Column(type="string", length=300, name="nombre")
     */
    protected $nombre;
    
    /**
     * @ORM\Column(type="string", length=100, name="email", unique=true)
     */
    protected $email;
    
    /**
     * @ORM\Column(type="date", name="fechac")
     */
    protected $fechac;

    
    /**
     * @ORM\OneToMany(targetEntity="SopSolicitud", mappedBy="usuarioRel")
     */
    
    protected $solicitudesUsuarioRel;
    
  
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->solicitudesUsuarioRel = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get codigoUsuarioPk
     *
     * @return integer 
     */
    public function getCodigoUsuarioPk()
    {
        return $this->codigoUsuarioPk;
    }

    /**
     * Set usuario
     *
     * @param integer $usuario
     * @return SopUsuario
     */
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;

        return $this;
    }

    /**
     * Get usuario
     *
     * @return integer 
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return SopUsuario
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return SopUsuario
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return SopUsuario
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set fechac
     *
     * @param \DateTime $fechac
     * @return SopUsuario
     */
    public function setFechac($fechac)
    {
        $this->fechac = $fechac;

        return $this;
    }

    /**
     * Get fechac
     *
     * @return \DateTime 
     */
    public function getFechac()
    {
        return $this->fechac;
    }

    /**
     * Add solicitudesUsuarioRel
     *
     * @param \helpdesk\SoporteBundle\Entity\SopSolicitud $solicitudesUsuarioRel
     * @return SopUsuario
     */
    public function addSolicitudesUsuarioRel(\helpdesk\SoporteBundle\Entity\SopSolicitud $solicitudesUsuarioRel)
    {
        $this->solicitudesUsuarioRel[] = $solicitudesUsuarioRel;

        return $this;
    }

    /**
     * Remove solicitudesUsuarioRel
     *
     * @param \helpdesk\SoporteBundle\Entity\SopSolicitud $solicitudesUsuarioRel
     */
    public function removeSolicitudesUsuarioRel(\helpdesk\SoporteBundle\Entity\SopSolicitud $solicitudesUsuarioRel)
    {
        $this->solicitudesUsuarioRel->removeElement($solicitudesUsuarioRel);
    }

    /**
     * Get solicitudesUsuarioRel
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSolicitudesUsuarioRel()
    {
        return $this->solicitudesUsuarioRel;
    }
}
