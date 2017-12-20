<?php

namespace BackBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RecrutementRct
 *
 * @ORM\Table(name="recrutement_rct", indexes={@ORM\Index(name="dmd_id", columns={"dmd_id"})})
 * @ORM\Entity(repositoryClass="BackBundle\Repository\RecrutementRctRepository")
 */
class RecrutementRct
{
    /**
     * @var integer
     *
     * @ORM\Column(name="rct_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $rctId;

    /**
     * @var string
     *
     * @ORM\Column(name="rct_nom_candidat", type="string", length=45, nullable=false)
     */
    private $rctNomCandidat;

    /**
     * @var string
     *
     * @ORM\Column(name="rct_prenom_candidat", type="string", length=45, nullable=true)
     */
    private $rctPrenomCandidat;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="rct_date_recrutement", type="date", nullable=true)
     */
    private $rctDateRecrutement;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="rct_date_integration", type="date", nullable=true)
     */
    private $rctDateIntegration;

    /**
     * @var string
     *
     * @ORM\Column(name="rct_periode_confirmee", type="string", nullable=false)
     */
    private $rctPeriodeConfirmee;

    /**
     * @var string
     *
     * @ORM\Column(name="rct_en_poste", type="string", nullable=true)
     */
    private $rctEnPoste;

    /**
     * @var string
     *
     * @ORM\Column(name="rct_garantie", type="string", nullable=true)
     */
    private $rctGarantie;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="rct_date_relance", type="date", nullable=true)
     */
    private $rctDateRelance;

    /**
     * @var integer
     *
     * @ORM\Column(name="rct_numero", type="integer", nullable=false)
     */
    private $rctNumero;

    /**
     * @var string
     *
     * @ORM\Column(name="rct_email", type="string", length=200, nullable=true)
     */
    private $rctEmail;

    /**
     * @var \DemandeRecrutementDmd
     *
     * @ORM\ManyToOne(targetEntity="DemandeRecrutementDmd")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="dmd_id", referencedColumnName="dmd_id")
     * })
     */
    private $dmd;

    /**
     * @return int
     */
    public function getRctId()
    {
        return $this->rctId;
    }

    /**
     * @param int $rctId
     */
    public function setRctId($rctId)
    {
        $this->rctId = $rctId;
    }

    /**
     * @return string
     */
    public function getRctNomCandidat()
    {
        return $this->rctNomCandidat;
    }

    /**
     * @param string $rctNomCandidat
     */
    public function setRctNomCandidat($rctNomCandidat)
    {
        $this->rctNomCandidat = $rctNomCandidat;
    }

    /**
     * @return string
     */
    public function getRctPrenomCandidat()
    {
        return $this->rctPrenomCandidat;
    }

    /**
     * @param string $rctPrenomCandidat
     */
    public function setRctPrenomCandidat($rctPrenomCandidat)
    {
        $this->rctPrenomCandidat = $rctPrenomCandidat;
    }

    /**
     * @return \DateTime
     */
    public function getRctDateRecrutement()
    {
        return $this->rctDateRecrutement;
    }

    /**
     * @param \DateTime $rctDateRecrutement
     */
    public function setRctDateRecrutement($rctDateRecrutement)
    {
        $this->rctDateRecrutement = $rctDateRecrutement;
    }

    /**
     * @return \DateTime
     */
    public function getRctDateIntegration()
    {
        return $this->rctDateIntegration;
    }

    /**
     * @param \DateTime $rctDateIntegration
     */
    public function setRctDateIntegration($rctDateIntegration)
    {
        $this->rctDateIntegration = $rctDateIntegration;
    }

    /**
     * @return string
     */
    public function getRctPeriodeConfirmee()
    {
        return $this->rctPeriodeConfirmee;
    }

    /**
     * @param string $rctPeriodeConfirmee
     */
    public function setRctPeriodeConfirmee($rctPeriodeConfirmee)
    {
        $this->rctPeriodeConfirmee = $rctPeriodeConfirmee;
    }

    /**
     * @return string
     */
    public function getRctEnPoste()
    {
        return $this->rctEnPoste;
    }

    /**
     * @param string $rctEnPoste
     */
    public function setRctEnPoste($rctEnPoste)
    {
        $this->rctEnPoste = $rctEnPoste;
    }

    /**
     * @return string
     */
    public function getRctGarantie()
    {
        return $this->rctGarantie;
    }

    /**
     * @param string $rctGarantie
     */
    public function setRctGarantie($rctGarantie)
    {
        $this->rctGarantie = $rctGarantie;
    }

    /**
     * @return \DateTime
     */
    public function getRctDateRelance()
    {
        return $this->rctDateRelance;
    }

    /**
     * @param \DateTime $rctDateRelance
     */
    public function setRctDateRelance($rctDateRelance)
    {
        $this->rctDateRelance = $rctDateRelance;
    }

    /**
     * @return int
     */
    public function getRctNumero()
    {
        return $this->rctNumero;
    }

    /**
     * @param int $rctNumero
     */
    public function setRctNumero($rctNumero)
    {
        $this->rctNumero = $rctNumero;
    }

    /**
     * @return string
     */
    public function getRctEmail()
    {
        return $this->rctEmail;
    }

    /**
     * @param string $rctEmail
     */
    public function setRctEmail($rctEmail)
    {
        $this->rctEmail = $rctEmail;
    }

    /**
     * @return \DemandeRecrutementDmd
     */
    public function getDmd()
    {
        return $this->dmd;
    }

    /**
     * @param \DemandeRecrutementDmd $dmd
     */
    public function setDmd($dmd)
    {
        $this->dmd = $dmd;
    }




}

