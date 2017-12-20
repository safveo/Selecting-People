<?php

namespace BackBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * IndicateursSp
 *
 * @ORM\Table(name="indicateurs_sp")
 * @ORM\Entity(repositoryClass="BackBundle\Repository\IndicateursSpRepository")
 */
class IndicateursSp
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="semaine", type="string", length=6, nullable=false)
     */
    private $semaine;

    /**
     * @var string
     *
     * @ORM\Column(name="id_demande", type="string", length=10, nullable=false)
     */
    private $idDemande;

    /**
     * @var string
     *
     * @ORM\Column(name="statut", type="string", length=50, nullable=false)
     */
    private $statut;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_demande", type="date", nullable=false)
     */
    private $dateDemande;

    /**
     * @var string
     *
     * @ORM\Column(name="type_recruteur", type="string", length=2, nullable=false)
     */
    private $typeRecruteur;

    /**
     * @var string
     *
     * @ORM\Column(name="recruteur", type="string", length=50, nullable=false)
     */
    private $recruteur;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getSemaine()
    {
        return $this->semaine;
    }

    /**
     * @param string $semaine
     */
    public function setSemaine($semaine)
    {
        $this->semaine = $semaine;
    }

    /**
     * @return string
     */
    public function getIdDemande()
    {
        return $this->idDemande;
    }

    /**
     * @param string $idDemande
     */
    public function setIdDemande($idDemande)
    {
        $this->idDemande = $idDemande;
    }

    /**
     * @return string
     */
    public function getStatut()
    {
        return $this->statut;
    }

    /**
     * @param string $statut
     */
    public function setStatut($statut)
    {
        $this->statut = $statut;
    }

    /**
     * @return \DateTime
     */
    public function getDateDemande()
    {
        return $this->dateDemande;
    }

    /**
     * @param \DateTime $dateDemande
     */
    public function setDateDemande($dateDemande)
    {
        $this->dateDemande = $dateDemande;
    }

    /**
     * @return string
     */
    public function getTypeRecruteur()
    {
        return $this->typeRecruteur;
    }

    /**
     * @param string $typeRecruteur
     */
    public function setTypeRecruteur($typeRecruteur)
    {
        $this->typeRecruteur = $typeRecruteur;
    }

    /**
     * @return string
     */
    public function getRecruteur()
    {
        return $this->recruteur;
    }

    /**
     * @param string $recruteur
     */
    public function setRecruteur($recruteur)
    {
        $this->recruteur = $recruteur;
    }





}

