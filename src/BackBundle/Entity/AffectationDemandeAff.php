<?php

namespace BackBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AffectationDemandeAff
 *
 * @ORM\Table(name="affectation_demande_aff", indexes={@ORM\Index(name="dmd_id", columns={"dmd_id"})})
 * @ORM\Entity(repositoryClass="BackBundle\Repository\AffectationDemandeAffRepository")
 */
class AffectationDemandeAff
{
    /**
     * @var integer
     *
     * @ORM\Column(name="aff_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $affId;

    /**
     * @var string
     *
     * @ORM\Column(name="aff_sous_traitance", type="string", nullable=true)
     */
    private $affSousTraitance;

    /**
     * @var string
     *
     * @ORM\Column(name="aff_id_recruteur", type="string", length=11, nullable=false)
     */
    private $affIdRecruteur;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="aff_date_affectation", type="datetime", nullable=true)
     */
    private $affDateAffectation;

    /**
     * @var boolean
     *
     * @ORM\Column(name="aff_premier_recruteur", type="boolean", nullable=false)
     */
    private $affPremierRecruteur = '0';

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
    public function getAffId()
    {
        return $this->affId;
    }

    /**
     * @param int $affId
     */
    public function setAffId($affId)
    {
        $this->affId = $affId;
    }

    /**
     * @return string
     */
    public function getAffSousTraitance()
    {
        return $this->affSousTraitance;
    }

    /**
     * @param string $affSousTraitance
     */
    public function setAffSousTraitance($affSousTraitance)
    {
        $this->affSousTraitance = $affSousTraitance;
    }

    /**
     * @return string
     */
    public function getAffIdRecruteur()
    {
        return $this->affIdRecruteur;
    }

    /**
     * @param string $affIdRecruteur
     */
    public function setAffIdRecruteur($affIdRecruteur)
    {
        $this->affIdRecruteur = $affIdRecruteur;
    }

    /**
     * @return \DateTime
     */
    public function getAffDateAffectation()
    {
        return $this->affDateAffectation;
    }

    /**
     * @param \DateTime $affDateAffectation
     */
    public function setAffDateAffectation($affDateAffectation)
    {
        $this->affDateAffectation = $affDateAffectation;
    }

    /**
     * @return bool
     */
    public function isAffPremierRecruteur()
    {
        return $this->affPremierRecruteur;
    }

    /**
     * @param bool $affPremierRecruteur
     */
    public function setAffPremierRecruteur($affPremierRecruteur)
    {
        $this->affPremierRecruteur = $affPremierRecruteur;
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

