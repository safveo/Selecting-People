<?php

namespace BackBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * StatutCollaborateurSta
 *
 * @ORM\Table(name="statut_collaborateur_sta")
 * @ORM\Entity
 */
class StatutCollaborateurSta
{
    /**
     * @var integer
     *
     * @ORM\Column(name="sta_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $staId;

    /**
     * @var string
     *
     * @ORM\Column(name="sta_libelle", type="string", length=45, nullable=false)
     */
    private $staLibelle;

    /**
     * @var integer
     *
     * @ORM\Column(name="sta_pe", type="integer", nullable=true)
     */
    private $staPe = '0';


}

