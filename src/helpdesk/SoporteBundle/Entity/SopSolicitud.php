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
     * @ORM\Column(type="integer", name="codigo_solicitud_pk")
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Id 
     */
    protected $codigoSolicitudPk;
 
    /**
     * @ORM\Column(type="integer", name="codigo_usuario_fk")
     */
    protected $codigoUsuarioFk;
 
    /**
     * @ORM\Column(type="integer", name="codigo_tipo_solicitud_fk")
     */
    protected $codigoTipoSolicitudFk;
 
    /**
     * @ORM\Column(type="text", name="descripcion")
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
     * @ORM\Column(type="text", name="observaciones", nullable=true)
     */
    protected $observaciones;
    
    /**
     * @ORM\Column(type="string", length=100, name="estado", options={"unsigned":true, "default":"Activo"})
     */
    protected $estado;
    
    
    /**
     * @ORM\ManyToOne(targetEntity="SopUsuario", inversedBy="solicitudesUsuarioRel")
     * @ORM\JoinColumn(name="codigo_usuario_fk", referencedColumnName="codigo_usuario_pk")
     */
    
    protected $usuarioRel;
    
    /**
     * @ORM\ManyToOne(targetEntity="SopSolicitudTipo", inversedBy="solictudesSolicitudTipoRel")
     * @ORM\JoinColumn(name="codigo_tipo_solicitud_fk", referencedColumnName="codigo_solicitud_tipo_pk") 
     */
    protected $solitudTipoRel;
 
    

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
     * Set codigoTipoSolicitudFk
     *
     * @param integer $codigoTipoSolicitudFk
     * @return SopSolicitud
     */
    public function setCodigoTipoSolicitudFk($codigoTipoSolicitudFk)
    {
        $this->codigoTipoSolicitudFk = $codigoTipoSolicitudFk;

        return $this;
    }

    /**
     * Get codigoTipoSolicitudFk
     *
     * @return integer 
     */
    public function getCodigoTipoSolicitudFk()
    {
        return $this->codigoTipoSolicitudFk;
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

    /**
     * Set observaciones
     *
     * @param string $observaciones
     * @return SopSolicitud
     */
    public function setObservaciones($observaciones)
    {
        $this->observaciones = $observaciones;

        return $this;
    }

    /**
     * Get observaciones
     *
     * @return string 
     */
    public function getObservaciones()
    {
        return $this->observaciones;
    }

    /**
     * Set estado
     *
     * @param string $estado
     * @return SopSolicitud
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get estado
     *
     * @return string 
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set usuarioRel
     *
     * @param \helpdesk\SoporteBundle\Entity\SopUsuario $usuarioRel
     * @return SopSolicitud
     */
    public function setUsuarioRel(\helpdesk\SoporteBundle\Entity\SopUsuario $usuarioRel = null)
    {
        $this->usuarioRel = $usuarioRel;

        return $this;
    }

    /**
     * Get usuarioRel
     *
     * @return \helpdesk\SoporteBundle\Entity\SopUsuario 
     */
    public function getUsuarioRel()
    {
        return $this->usuarioRel;
    }

    /**
     * Set solitudTipoRel
     *
     * @param \helpdesk\SoporteBundle\Entity\SopSolicitudTipo $solitudTipoRel
     * @return SopSolicitud
     */
    public function setSolitudTipoRel(\helpdesk\SoporteBundle\Entity\SopSolicitudTipo $solitudTipoRel = null)
    {
        $this->solitudTipoRel = $solitudTipoRel;

        return $this;
    }

    /**
     * Get solitudTipoRel
     *
     * @return \helpdesk\SoporteBundle\Entity\SopSolicitudTipo 
     */
    public function getSolitudTipoRel()
    {
        return $this->solitudTipoRel;
    }
}
