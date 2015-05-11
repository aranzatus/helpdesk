<?php
namespace helpdesk\SoporteBundle\Entity;
 
use Doctrine\ORM\Mapping as ORM;
 
/**
 * @ORM\Entity
 * @ORM\Table(name="sop_solicitud_tipo")
 */
class SopSolicitudTipo
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer", name="codigo_solicitud_tipo_pk")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $codigoTipoSolicitudPk;
 
    /**
     * @ORM\Column(type="string", length=300, name="solicitud_tipo")
     */
    protected $solicitudTipo;
   

    /**
     * Get codigoSolicitudTipoPk
     *
     * @return integer 
     */
    public function getCodigoSolicitudTipoPk()
    {
        return $this->codigoSolicitudTipoPk;
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
     * Get codigoTipoSolicitudFk
     *
     * @return integer 
     */
    public function getCodigoTipoSolicitudFk()
    {
        return $this->codigoTipoSolicitudFk;
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
}
