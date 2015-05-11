<?php
namespace helpdesk\SoporteBundle\Entity;
 
use Doctrine\ORM\Mapping as ORM;
 
/**
 * @ORM\Entity
 * @ORM\Table(name="sop_usuario")
 */
class SopUsuario
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer", name="id_usuariopk")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $idUsuarioPk;
 
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
     * @ORM\Column(type="date", name="fechac")
     */
    protected $fechac;

    /**
     * Get idUsuarioPk
     *
     * @return integer 
     */
    public function getIdUsuarioPk()
    {
        return $this->idUsuarioPk;
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
}
