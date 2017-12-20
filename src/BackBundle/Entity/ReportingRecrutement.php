<?php

namespace BackBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ReportingRecrutement
 *
 * @ORM\Table(name="reporting_recrutement")
 * @ORM\Entity
 */
class ReportingRecrutement
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
     * @ORM\Column(name="dmd_date", type="date", nullable=true)
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
     * @ORM\Column(name="ste_id", type="string", length=6, nullable=true)
     */
    private $steId;

    /**
     * @var integer
     *
     * @ORM\Column(name="bdg_id", type="integer", nullable=true)
     */
    private $bdgId;

    /**
     * @var string
     *
     * @ORM\Column(name="dmd_produit", type="string", length=45, nullable=true)
     */
    private $dmdProduit;

    /**
     * @var integer
     *
     * @ORM\Column(name="ctr_id", type="integer", nullable=true)
     */
    private $ctrId;

    /**
     * @var integer
     *
     * @ORM\Column(name="sta_id", type="integer", nullable=true)
     */
    private $staId;

    /**
     * @var string
     *
     * @ORM\Column(name="pys_id", type="string", length=45, nullable=true)
     */
    private $pysId;

    /**
     * @var string
     *
     * @ORM\Column(name="dmd_ville", type="string", length=50, nullable=true)
     */
    private $dmdVille;

    /**
     * @var string
     *
     * @ORM\Column(name="dmd_confidentiel", type="string", nullable=true)
     */
    private $dmdConfidentiel;

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
     * @ORM\Column(name="dmd_nom_demandeur", type="string", length=45, nullable=true)
     */
    private $dmdNomDemandeur;

    /**
     * @var string
     *
     * @ORM\Column(name="dmd_mail_demandeur", type="string", length=45, nullable=true)
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
     * @ORM\Column(name="dmd_reference", type="string", length=12, nullable=true)
     */
    private $dmdReference;

    /**
     * @var string
     *
     * @ORM\Column(name="dmd_acompte", type="decimal", precision=10, scale=2, nullable=true)
     */
    private $dmdAcompte;

    /**
     * @var string
     *
     * @ORM\Column(name="dmd_solde", type="decimal", precision=10, scale=2, nullable=true)
     */
    private $dmdSolde;

    /**
     * @var integer
     *
     * @ORM\Column(name="dmd_salaire", type="integer", nullable=true)
     */
    private $dmdSalaire;

    /**
     * @var string
     *
     * @ORM\Column(name="dmd_periode_essai", type="string", length=20, nullable=true)
     */
    private $dmdPeriodeEssai;

    /**
     * @var integer
     *
     * @ORM\Column(name="dmd_id_doublon", type="integer", nullable=true)
     */
    private $dmdIdDoublon;

    /**
     * @var string
     *
     * @ORM\Column(name="dmd_commentaire_dir", type="string", length=255, nullable=true)
     */
    private $dmdCommentaireDir;


}

