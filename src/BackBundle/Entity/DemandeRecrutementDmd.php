<?php

namespace BackBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DemandeRecrutementDmd
 *
 * @ORM\Table(name="demande_recrutement_dmd", indexes={@ORM\Index(name="statut", columns={"sta_id"}), @ORM\Index(name="contrat_fk", columns={"ctr_id"}), @ORM\Index(name="prd_id_fk", columns={"dmd_produit"}), @ORM\Index(name="stm_id", columns={"stm_id"}), @ORM\Index(name="dmd_id_doublon", columns={"dmd_id_doublon"})})
 * @ORM\Entity
 */
class DemandeRecrutementDmd
{
    /**
     * @var integer
     *
     * @ORM\Column(name="dmd_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $dmdId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dmd_date", type="date", nullable=false)
     */
    private $dmdDate;

    /**
     * @var string
     *
     * @ORM\Column(name="usr_matricule", type="string", length=6, nullable=true)
     */
    private $usrMatricule;

    /**
     * @var string
     *
     * @ORM\Column(name="ste_id", type="string", length=6, nullable=false)
     */
    private $steId;

    /**
     * @var integer
     *
     * @ORM\Column(name="bdg_id", type="integer", nullable=false)
     */
    private $bdgId;

    /**
     * @var string
     *
     * @ORM\Column(name="dmd_produit", type="string", length=45, nullable=true)
     */
    private $dmdProduit;

    /**
     * @var string
     *
     * @ORM\Column(name="pys_id", type="string", length=45, nullable=false)
     */
    private $pysId;

    /**
     * @var string
     *
     * @ORM\Column(name="dmd_ville", type="string", length=50, nullable=false)
     */
    private $dmdVille;

    /**
     * @var string
     *
     * @ORM\Column(name="dmd_confidentiel", type="string", nullable=false)
     */
    private $dmdConfidentiel = 'NON';

    /**
     * @var integer
     *
     * @ORM\Column(name="stm_id", type="integer", nullable=true)
     */
    private $stmId;

    /**
     * @var string
     *
     * @ORM\Column(name="dmd_prenom_demandeur", type="string", length=45, nullable=true)
     */
    private $dmdPrenomDemandeur;

    /**
     * @var string
     *
     * @ORM\Column(name="dmd_nom_demandeur", type="string", length=45, nullable=false)
     */
    private $dmdNomDemandeur;

    /**
     * @var string
     *
     * @ORM\Column(name="dmd_mail_demandeur", type="string", length=45, nullable=false)
     */
    private $dmdMailDemandeur;

    /**
     * @var integer
     *
     * @ORM\Column(name="reg_id", type="integer", nullable=true)
     */
    private $regId;

    /**
     * @var string
     *
     * @ORM\Column(name="dmd_commentaire", type="string", length=255, nullable=true)
     */
    private $dmdCommentaire;

    /**
     * @var string
     *
     * @ORM\Column(name="dmd_reference", type="string", length=12, nullable=false)
     */
    private $dmdReference;

    /**
     * @var string
     *
     * @ORM\Column(name="dmd_acompte", type="decimal", precision=10, scale=2, nullable=true)
     */
    private $dmdAcompte = '0.00';

    /**
     * @var string
     *
     * @ORM\Column(name="dmd_solde", type="decimal", precision=10, scale=2, nullable=true)
     */
    private $dmdSolde = '0.00';

    /**
     * @var integer
     *
     * @ORM\Column(name="dmd_salaire", type="integer", nullable=true)
     */
    private $dmdSalaire = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="dmd_periode_essai", type="string", length=20, nullable=true)
     */
    private $dmdPeriodeEssai;

    /**
     * @var string
     *
     * @ORM\Column(name="dmd_commentaire_dir", type="string", length=255, nullable=true)
     */
    private $dmdCommentaireDir;

    /**
     * @var string
     *
     * @ORM\Column(name="dmd_preference", type="string", length=11, nullable=true)
     */
    private $dmdPreference;

    /**
     * @var string
     *
     * @ORM\Column(name="dmd_exclusion", type="string", length=11, nullable=true)
     */
    private $dmdExclusion;

    /**
     * @var string
     *
     * @ORM\Column(name="dmd_charge_recherche", type="string", length=6, nullable=false)
     */
    private $dmdChargeRecherche;

    /**
     * @var \TypeContratCtr
     *
     * @ORM\ManyToOne(targetEntity="TypeContratCtr")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ctr_id", referencedColumnName="ctr_id")
     * })
     */
    private $ctr;

    /**
     * @var \DemandeRecrutementDmd
     *
     * @ORM\ManyToOne(targetEntity="DemandeRecrutementDmd")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="dmd_id_doublon", referencedColumnName="dmd_id")
     * })
     */
    private $dmdDoublon;

    /**
     * @var \StatutCollaborateurSta
     *
     * @ORM\ManyToOne(targetEntity="StatutCollaborateurSta")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sta_id", referencedColumnName="sta_id")
     * })
     */
    private $sta;

    /**
     * @return int
     */
    public function getDmdId()
    {
        return $this->dmdId;
    }

    /**
     * @param int $dmdId
     */
    public function setDmdId($dmdId)
    {
        $this->dmdId = $dmdId;
    }

    /**
     * @return \DateTime
     */
    public function getDmdDate()
    {
        return $this->dmdDate;
    }

    /**
     * @param \DateTime $dmdDate
     */
    public function setDmdDate($dmdDate)
    {
        $this->dmdDate = $dmdDate;
    }

    /**
     * @return string
     */
    public function getUsrMatricule()
    {
        return $this->usrMatricule;
    }

    /**
     * @param string $usrMatricule
     */
    public function setUsrMatricule($usrMatricule)
    {
        $this->usrMatricule = $usrMatricule;
    }

    /**
     * @return string
     */
    public function getSteId()
    {
        return $this->steId;
    }

    /**
     * @param string $steId
     */
    public function setSteId($steId)
    {
        $this->steId = $steId;
    }

    /**
     * @return int
     */
    public function getBdgId()
    {
        return $this->bdgId;
    }

    /**
     * @param int $bdgId
     */
    public function setBdgId($bdgId)
    {
        $this->bdgId = $bdgId;
    }

    /**
     * @return string
     */
    public function getDmdProduit()
    {
        return $this->dmdProduit;
    }

    /**
     * @param string $dmdProduit
     */
    public function setDmdProduit($dmdProduit)
    {
        $this->dmdProduit = $dmdProduit;
    }

    /**
     * @return string
     */
    public function getPysId()
    {
        return $this->pysId;
    }

    /**
     * @param string $pysId
     */
    public function setPysId($pysId)
    {
        $this->pysId = $pysId;
    }

    /**
     * @return string
     */
    public function getDmdVille()
    {
        return $this->dmdVille;
    }

    /**
     * @param string $dmdVille
     */
    public function setDmdVille($dmdVille)
    {
        $this->dmdVille = $dmdVille;
    }

    /**
     * @return string
     */
    public function getDmdConfidentiel()
    {
        return $this->dmdConfidentiel;
    }

    /**
     * @param string $dmdConfidentiel
     */
    public function setDmdConfidentiel($dmdConfidentiel)
    {
        $this->dmdConfidentiel = $dmdConfidentiel;
    }

    /**
     * @return int
     */
    public function getStmId()
    {
        return $this->stmId;
    }

    /**
     * @param int $stmId
     */
    public function setStmId($stmId)
    {
        $this->stmId = $stmId;
    }

    /**
     * @return string
     */
    public function getDmdPrenomDemandeur()
    {
        return $this->dmdPrenomDemandeur;
    }

    /**
     * @param string $dmdPrenomDemandeur
     */
    public function setDmdPrenomDemandeur($dmdPrenomDemandeur)
    {
        $this->dmdPrenomDemandeur = $dmdPrenomDemandeur;
    }

    /**
     * @return string
     */
    public function getDmdNomDemandeur()
    {
        return $this->dmdNomDemandeur;
    }

    /**
     * @param string $dmdNomDemandeur
     */
    public function setDmdNomDemandeur($dmdNomDemandeur)
    {
        $this->dmdNomDemandeur = $dmdNomDemandeur;
    }

    /**
     * @return string
     */
    public function getDmdMailDemandeur()
    {
        return $this->dmdMailDemandeur;
    }

    /**
     * @param string $dmdMailDemandeur
     */
    public function setDmdMailDemandeur($dmdMailDemandeur)
    {
        $this->dmdMailDemandeur = $dmdMailDemandeur;
    }

    /**
     * @return int
     */
    public function getRegId()
    {
        return $this->regId;
    }

    /**
     * @param int $regId
     */
    public function setRegId($regId)
    {
        $this->regId = $regId;
    }

    /**
     * @return string
     */
    public function getDmdCommentaire()
    {
        return $this->dmdCommentaire;
    }

    /**
     * @param string $dmdCommentaire
     */
    public function setDmdCommentaire($dmdCommentaire)
    {
        $this->dmdCommentaire = $dmdCommentaire;
    }

    /**
     * @return string
     */
    public function getDmdReference()
    {
        return $this->dmdReference;
    }

    /**
     * @param string $dmdReference
     */
    public function setDmdReference($dmdReference)
    {
        $this->dmdReference = $dmdReference;
    }

    /**
     * @return string
     */
    public function getDmdAcompte()
    {
        return $this->dmdAcompte;
    }

    /**
     * @param string $dmdAcompte
     */
    public function setDmdAcompte($dmdAcompte)
    {
        $this->dmdAcompte = $dmdAcompte;
    }

    /**
     * @return string
     */
    public function getDmdSolde()
    {
        return $this->dmdSolde;
    }

    /**
     * @param string $dmdSolde
     */
    public function setDmdSolde($dmdSolde)
    {
        $this->dmdSolde = $dmdSolde;
    }

    /**
     * @return int
     */
    public function getDmdSalaire()
    {
        return $this->dmdSalaire;
    }

    /**
     * @param int $dmdSalaire
     */
    public function setDmdSalaire($dmdSalaire)
    {
        $this->dmdSalaire = $dmdSalaire;
    }

    /**
     * @return string
     */
    public function getDmdPeriodeEssai()
    {
        return $this->dmdPeriodeEssai;
    }

    /**
     * @param string $dmdPeriodeEssai
     */
    public function setDmdPeriodeEssai($dmdPeriodeEssai)
    {
        $this->dmdPeriodeEssai = $dmdPeriodeEssai;
    }

    /**
     * @return string
     */
    public function getDmdCommentaireDir()
    {
        return $this->dmdCommentaireDir;
    }

    /**
     * @param string $dmdCommentaireDir
     */
    public function setDmdCommentaireDir($dmdCommentaireDir)
    {
        $this->dmdCommentaireDir = $dmdCommentaireDir;
    }

    /**
     * @return string
     */
    public function getDmdPreference()
    {
        return $this->dmdPreference;
    }

    /**
     * @param string $dmdPreference
     */
    public function setDmdPreference($dmdPreference)
    {
        $this->dmdPreference = $dmdPreference;
    }

    /**
     * @return string
     */
    public function getDmdExclusion()
    {
        return $this->dmdExclusion;
    }

    /**
     * @param string $dmdExclusion
     */
    public function setDmdExclusion($dmdExclusion)
    {
        $this->dmdExclusion = $dmdExclusion;
    }

    /**
     * @return string
     */
    public function getDmdChargeRecherche()
    {
        return $this->dmdChargeRecherche;
    }

    /**
     * @param string $dmdChargeRecherche
     */
    public function setDmdChargeRecherche($dmdChargeRecherche)
    {
        $this->dmdChargeRecherche = $dmdChargeRecherche;
    }

    /**
     * @return \TypeContratCtr
     */
    public function getCtr()
    {
        return $this->ctr;
    }

    /**
     * @param \TypeContratCtr $ctr
     */
    public function setCtr($ctr)
    {
        $this->ctr = $ctr;
    }

    /**
     * @return \DemandeRecrutementDmd
     */
    public function getDmdDoublon()
    {
        return $this->dmdDoublon;
    }

    /**
     * @param \DemandeRecrutementDmd $dmdDoublon
     */
    public function setDmdDoublon($dmdDoublon)
    {
        $this->dmdDoublon = $dmdDoublon;
    }

    /**
     * @return \StatutCollaborateurSta
     */
    public function getSta()
    {
        return $this->sta;
    }

    /**
     * @param \StatutCollaborateurSta $sta
     */
    public function setSta($sta)
    {
        $this->sta = $sta;
    }





}

