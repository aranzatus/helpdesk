<?php
namespace helpdesk\SoporteBundle\Entity;
 
use Doctrine\ORM\Mapping as ORM;
 
/**
 * @ORM\Entity
 * @ORM\Table(name="sop_solicitud")
 */
class SopSolicitud
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer", name="codigo_solicitud_pk")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $codigoSolicitudPk;
 
    /**
     * @ORM\Column(type="integer", name="codigo_usuario_fk")
     */
    protected $codigoUsuarioFk;
 
    /**
     * @ORM\Column(type="string", length=100, name="asunto")
     */
    protected $asunto;
 
    /**
     * @ORM\Column(type="text", name="descripcion", nullable=true)
     */
    protected $descripcion;
    
    /**
     * @ORM\Column(type="date", name="fecha")
     */
    protected $fecha;
    
    /**
     * @ORM\Column(type="date", name="fecha_solucion", nullable=true)
     */
    protected $fechaSolucion;
 

    /**
     * Get codigoSolicitudPk
     *
     * @return integer 
     */
    public function getCodigoSolicitudPk()
    {
        return $this->codigoSolicitudPk;
    }

    /**
     * Set codigoUsuarioFk
     *
     * @param integer $codigoUsuarioFk
     * @return SopSolicitud
     */
    public function setCodigoUsuarioFk($codigoUsuarioFk)
    {
        $this->codigoUsuarioFk = $codigoUsuarioFk;

        return $this;
    }

    /**
     * Get codigoUsuarioFk
     *
     * @return integer 
     */
    public function getCodigoUsuarioFk()
    {
        return $this->codigoUsuarioFk;
    }

    /**
     * Set asunto
     *
     * @param string $asunto
     * @return SopSolicitud
     */
    public function setAsunto($asunto)
    {
        $this->asunto = $asunto;

        return $this;
    }

    /**
     * Get asunto
     *
     * @return string 
     */
    public function getAsunto()
    {
        return $this->asunto;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return SopSolicitud
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string 
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return SopSolicitud
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime 
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set fechaSolucion
     *
     * @param \DateTime $fechaSolucion
     * @return SopSolicitud
     */
    public function setFechaSolucion($fechaSolucion)
    {
        $this->fechaSolucion = $fechaSolucion;

        return $this;
    }

    /**
     * Get fechaSolucion
     *
     * @return \DateTime 
     */
    public function getFechaSolucion()
    {
        return $this->fechaSolucion;
    }
}
