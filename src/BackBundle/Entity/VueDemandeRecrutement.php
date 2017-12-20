<?php

namespace BackBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * VueDemandeRecrutement
 *
 * @ORM\Table(name="vue_demande_recrutement")
 * @ORM\Entity
 */
class VueDemandeRecrutement
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
     * @var string
     *
     * @ORM\Column(name="pst_libelle", type="string", length=45, nullable=true)
     */
    private $pstLibelle;

    /**
     * @var string
     *
     * @ORM\Column(name="pys_id", type="string", length=45, nullable=true)
     */
    private $pysId;

    /**
     * @var string
     *
     * @ORM\Column(name="pys_nom", type="string", length=45, nullable=true)
     */
    private $pysNom;

    /**
     * @var string
     *
     * @ORM\Column(name="reg_libelle", type="string", length=255, nullable=true)
     */
    private $regLibelle;

    /**
     * @var string
     *
     * @ORM\Column(name="dmd_ville", type="string", length=50, nullable=true)
     */
    private $dmdVille;

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
     * @ORM\Column(name="dir_libelle", type="string", length=45, nullable=true)
     */
    private $dirLibelle;

    /**
     * @var string
     *
     * @ORM\Column(name="srv_libelle", type="string", length=45, nullable=true)
     */
    private $srvLibelle;

    /**
     * @var string
     *
     * @ORM\Column(name="pol_libelle", type="string", length=45, nullable=true)
     */
    private $polLibelle;

    /**
     * @var string
     *
     * @ORM\Column(name="dmd_date", type="string", length=10, nullable=true)
     */
    private $dmdDate;

    /**
     * @var integer
     *
     * @ORM\Column(name="stm_id", type="integer", nullable=true)
     */
    private $stmId;

    /**
     * @var string
     *
     * @ORM\Column(name="stm_libelle", type="string", length=45, nullable=true)
     */
    private $stmLibelle;

    /**
     * @var string
     *
     * @ORM\Column(name="dmd_confidentiel", type="string", nullable=true)
     */
    private $dmdConfidentiel;

    /**
     * @var string
     *
     * @ORM\Column(name="dmd_reference", type="string", length=12, nullable=true)
     */
    private $dmdReference;

    /**
     * @var string
     *
     * @ORM\Column(name="ste_id", type="string", length=6, nullable=true)
     */
    private $steId;

    /**
     * @var string
     *
     * @ORM\Column(name="ste_libelle", type="string", length=45, nullable=true)
     */
    private $steLibelle;

    /**
     * @var string
     *
     * @ORM\Column(name="dmd_produit", type="string", length=45, nullable=true)
     */
    private $dmdProduit;

    /**
     * @var string
     *
     * @ORM\Column(name="ctr_libelle", type="string", length=45, nullable=true)
     */
    private $ctrLibelle;

    /**
     * @var string
     *
     * @ORM\Column(name="sta_libelle", type="string", length=45, nullable=true)
     */
    private $staLibelle;

    /**
     * @var integer
     *
     * @ORM\Column(name="dmd_salaire", type="integer", nullable=true)
     */
    private $dmdSalaire;

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
     * @var string
     *
     * @ORM\Column(name="dmd_periode_essai", type="string", length=20, nullable=true)
     */
    private $dmdPeriodeEssai;

    /**
     * @var string
     *
     * @ORM\Column(name="dmd_commentaire", type="string", length=255, nullable=true)
     */
    private $dmdCommentaire;

    /**
     * @var string
     *
     * @ORM\Column(name="dmd_commentaire_dir", type="string", length=255, nullable=true)
     */
    private $dmdCommentaireDir;

    /**
     * @var string
     *
     * @ORM\Column(name="p1_rct_nom_candidat", type="string", length=45, nullable=true)
     */
    private $p1RctNomCandidat;

    /**
     * @var string
     *
     * @ORM\Column(name="p1_rct_prenom_candidat", type="string", length=45, nullable=true)
     */
    private $p1RctPrenomCandidat;

    /**
     * @var string
     *
     * @ORM\Column(name="p1_rct_date_recrutement", type="string", length=10, nullable=true)
     */
    private $p1RctDateRecrutement;

    /**
     * @var string
     *
     * @ORM\Column(name="p1_rct_date_integration", type="string", length=10, nullable=true)
     */
    private $p1RctDateIntegration;

    /**
     * @var integer
     *
     * @ORM\Column(name="p1_duree_recrutement", type="bigint", nullable=true)
     */
    private $p1DureeRecrutement;

    /**
     * @var string
     *
     * @ORM\Column(name="p1_rct_en_poste", type="string", length=3, nullable=true)
     */
    private $p1RctEnPoste;

    /**
     * @var string
     *
     * @ORM\Column(name="p1_rct_periode_confirmee", type="string", length=3, nullable=true)
     */
    private $p1RctPeriodeConfirmee;

    /**
     * @var string
     *
     * @ORM\Column(name="p1_rct_garantie", type="string", length=3, nullable=true)
     */
    private $p1RctGarantie;

    /**
     * @var string
     *
     * @ORM\Column(name="p1_rct_date_relance", type="string", length=10, nullable=true)
     */
    private $p1RctDateRelance;

    /**
     * @var string
     *
     * @ORM\Column(name="p2_rct_nom_candidat", type="string", length=45, nullable=true)
     */
    private $p2RctNomCandidat;

    /**
     * @var string
     *
     * @ORM\Column(name="p2_rct_prenom_candidat", type="string", length=45, nullable=true)
     */
    private $p2RctPrenomCandidat;

    /**
     * @var string
     *
     * @ORM\Column(name="p2_rct_date_recrutement", type="string", length=10, nullable=true)
     */
    private $p2RctDateRecrutement;

    /**
     * @var string
     *
     * @ORM\Column(name="p2_rct_date_integration", type="string", length=10, nullable=true)
     */
    private $p2RctDateIntegration;

    /**
     * @var string
     *
     * @ORM\Column(name="p2_rct_en_poste", type="string", length=3, nullable=true)
     */
    private $p2RctEnPoste;


}

