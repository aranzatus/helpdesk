<?php
namespace helpdesk\SoporteBundle\Entity;
 
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntityValidator;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * @ORM\Entity
 * @ORM\Table(name="sop_solicitud_tipo")
 */
class SopSolicitudTipo
{ 
    /**
     * @ORM\Column(type="integer", name="codigo_solicitud_tipo_pk")
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Id
     */
    protected $codigoTipoSolicitudPk;
 
    /**
     * @ORM\Column(type="string", length=300, name="solicitud_tipo")
     */
    protected $solicitudTipo;
   
    
     /**
     * @ORM\OneToMany(targetEntity="SopSolicitud", mappedBy="solitudTipoRel")
     */
    
    protected $solicitudesSolicitudTipoRel;

    
   
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->solicitudesSolicitudTipoRel = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get codigoTipoSolicitudPk
     *
     * @return integer 
     */
    public function getCodigoTipoSolicitudPk()
    {
        return $this->codigoTipoSolicitudPk;
    }

    /**
     * Set solicitudTipo
     *
     * @param string $solicitudTipo
     * @return SopSolicitudTipo
     */
    public function setSolicitudTipo($solicitudTipo)
    {
        $this->solicitudTipo = $solicitudTipo;

        return $this;
    }

    /**
     * Get solicitudTipo
     *
     * @return string 
     */
    public function getSolicitudTipo()
    {
        return $this->solicitudTipo;
    }

    /**
     * Add solicitudesSolicitudTipoRel
     *
     * @param \helpdesk\SoporteBundle\Entity\SopSolicitud $solicitudesSolicitudTipoRel
     * @return SopSolicitudTipo
     */
    public function addSolicitudesSolicitudTipoRel(\helpdesk\SoporteBundle\Entity\SopSolicitud $solicitudesSolicitudTipoRel)
    {
        $this->solicitudesSolicitudTipoRel[] = $solicitudesSolicitudTipoRel;

        return $this;
    }

    /**
     * Remove solicitudesSolicitudTipoRel
     *
     * @param \helpdesk\SoporteBundle\Entity\SopSolicitud $solicitudesSolicitudTipoRel
     */
    public function removeSolicitudesSolicitudTipoRel(\helpdesk\SoporteBundle\Entity\SopSolicitud $solicitudesSolicitudTipoRel)
    {
        $this->solicitudesSolicitudTipoRel->removeElement($solicitudesSolicitudTipoRel);
    }

    /**
     * Get solicitudesSolicitudTipoRel
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSolicitudesSolicitudTipoRel()
    {
        return $this->solicitudesSolicitudTipoRel;
    }
}
